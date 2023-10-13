<?php

namespace App\Http\Controllers\api;

use App\User;
use \stdClass;
use Carbon\Carbon;
use App\Models\Acte;
use App\Models\Livre;
use App\Models\Examen;
use App\Models\Valeur;
use App\Models\Product;
use App\Models\Exercice;
use App\Models\Paiement;
use App\Models\Structure;
use App\Models\CreanceDette;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class eSoinsController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    // TYPE STRUCTURE
    public function dataSelect(String $parametre)
    {
        $valeurs = new StdClass();
        switch ($parametre) {
            // TYPE STRUCTURE
            case 'structures':
                $valeurs = Structure::where(['is_delete'=>FALSE])->get();
                break;
            // PRESTATIONS
            case 'prestations':
                $valeurs = Valeur::where(['is_delete'=>FALSE, 'id_parametre'=>env('PARAM_CIBLE')])->get();
                break;
            // TYPE PRESTATION
            case 'typeprestation':
                $valeurs = Valeur::where(['is_delete'=>FALSE, 'id_parametre'=>env('TYPE_PRESTATION')])->get();
                break;
            // QUALIFICATION
            case 'qualifications':
                $valeurs = Valeur::where(['is_delete'=>FALSE, 'id_parametre'=>env('PARAM_QUALIFICATION')])->get();
                break;
            // PRODUITS
            case 'products':
                $valeurs = Product::all();
                break;
            // ACTES
            case 'actes':
                $valeurs = Acte::all();
                break;
            // EXAMENS
            case 'examens':
                $valeurs = Examen::all();
                break;
            default:
                # code...
                break;
        }
        return response()->json($valeurs);
    }

    // GET VALEUR
    public function getValeur(String $id_parametre)
    {
        $valeurs = Valeur::where(['is_delete'=>FALSE, 'id_parent'=>$id_parametre])->get();
        return response()->json($valeurs);
    }

    /**
     * Get an authenticated user factures
     *
     * @return [json] factures object
     */
    public function factures(Request $request)
    {
        $user = DB::table('users')
                        ->join('structures', 'users.structure_id', 'structures.id')
                        ->select('users.*', 'structures.nom_structure', 'structures.level_structure')
                        ->where('users.id', $request->user()->id)
                        ->first();

        switch ($user->level_structure) {
            case env('LEVEL_NATIONAL'):
            case env('LEVEL_DRS'):
                $structures = Structure::find($request->user()->structure_id)->getAllChildren();
                $array = array();
                foreach ($structures as $structure) {
                    array_push($array, $structure->id);
                }

                $factures = DB::table('feuille_soin')->whereIn('structures.id', $array)
                            ->join('structures', 'feuille_soin.id_structure', 'structures.id')
                            ->select('feuille_soin.*', 'structures.nom_structure')
                            ->orderBy('feuille_soin.created_at', 'desc')
                            ->get();
                break;
            case env('LEVEL_DISTRICT'):
                $factures = DB::table('feuille_soin')->where('structures.parent_id', $request->user()->structure_id)
                            ->join('structures', 'feuille_soin.id_structure', 'structures.id')
                            ->select('feuille_soin.*', 'structures.nom_structure')
                            ->orderBy('feuille_soin.created_at', 'desc')
                            ->get();
                break;
            default:
                $factures = DB::table('feuille_soin')->where('feuille_soin.user_id',  $request->user()->id)
                            ->join('structures', 'feuille_soin.id_structure', 'structures.id')
                            ->select('feuille_soin.*', 'structures.nom_structure')
                            ->orderBy('feuille_soin.created_at', 'desc')
                            ->get();
                break;
        }

        return response()->json($factures);
    }

    // COMPUTE WIH TWO PARAMS AND RETURN BIRTHDATE
    public function getBirthDate($age, $birth_date_item)
    {
        if($birth_date_item == 'day'){
            $currentDate = Carbon::now();
            $patient_date = $currentDate->subDays(intval($age));
        }
        else if($birth_date_item == 'month'){
            $currentDate = Carbon::now();
            $patient_date = $currentDate->subMonths(intval($age));
        }
        else if($birth_date_item == 'year'){
            $currentDate = Carbon::now();
            $patient_date = $currentDate->subYears(intval($age));
        }

        return $patient_date->format('d-m-Y');
    }

    /**
     * Store a new facture
     *
     * @return success message
     */
    public function storeFacture(Request $request)
    {
        $request->validate([
            'nom_patient' => 'nullable',
            'village_patient' => 'nullable',
            'distance_village_patient' => 'nullable',
            'age' => 'nullable',
            'birth_date_item' => 'nullable',
            'sexe_patient' => 'nullable',
            'parent_patient' => 'nullable',
            'num_telephone' => 'nullable',
            'consultation_date' => 'required',
            'serie_number' => 'nullable',
            'registre_number' => 'required',
            'patient_type' => 'required',
            'type_prestation' => 'required',
            'liste_prod' => 'required',
            'quantity_prod' => 'required',
            'montant_prod' => 'required',
            'cout_total_prod' => 'required',
            'liste_act' => 'nullable',
            'quantity_act' => 'nullable',
            'montant_act' => 'nullable',
            'cout_total_act' => 'nullable',
            'liste_ex' => 'nullable',
            'quantity_ex' => 'nullable',
            'montant_ex' => 'nullable',
            'cout_total_ex' => 'nullable',
            'type_observation' => 'nullable',
            'nbre_jours' => 'nullable',
            'cout_mise_en_observation' => 'nullable',
            'cout_evacuation' => 'nullable',
            'name_prescripteur' => 'required',
            'contact_prescripteur' => 'required',
            'qualification_prescripteur' => 'required',
            'name_gerant' => 'required',
            'contact_gerant' => 'required'
        ]);

        // List prod
        $array_prod = array();
        $tab_prod = explode(',',  $request->liste_prod);
        for($i=0;$i<count($tab_prod); $i++){
            if(strlen($tab_prod[$i])>0){
                array_push($array_prod, $tab_prod[$i]);
            }
        }
        $liste_prod = implode(" ", $array_prod);

        // List act
        $array_act = array();
        $tab_act = explode(',',  $request->liste_act);
        for($i=0;$i<count($tab_act); $i++){
            if(strlen($tab_act[$i])>0){
                array_push($array_act, $tab_act[$i]);
            }
        }
        $liste_act = implode(" ", $array_act);

        // List ex
        $array_ex = array();
        $tab_ex = explode(',',  $request->liste_ex);
        for($i=0;$i<count($tab_ex); $i++){
            if(strlen($tab_ex[$i])>0){
                array_push($array_ex, $tab_ex[$i]);
            }
        }
        $liste_ex = implode(" ", $array_ex);

        // Quantity prod
        $arrayquantity_prod = array();
        $tabquantity_prod = explode(',',  $request->quantity_prod);
        for($i=0;$i<count($tabquantity_prod); $i++){
            if(strlen($tabquantity_prod[$i])>0){
                array_push($arrayquantity_prod, $tabquantity_prod[$i]);
            }
        }
        $quantity_prod = implode(" ", $arrayquantity_prod);

        // Quantity act
        $arrayquantity_act = array();
        $tabquantity_act = explode(',',  $request->quantity_act);
        for($i=0;$i<count($tabquantity_act); $i++){
            if(strlen($tabquantity_act[$i])>0){
                array_push($arrayquantity_act, $tabquantity_act[$i]);
            }
        }
        $quantity_act = implode(" ", $arrayquantity_act);

        // Quantity eq
        $arrayquantity_ex = array();
        $tabquantity_ex = explode(',',  $request->quantity_ex);
        for($i=0;$i<count($tabquantity_ex); $i++){
            if(strlen($tabquantity_ex[$i])>0){
                array_push($arrayquantity_ex, $tabquantity_ex[$i]);
            }
        }
        $quantity_ex = implode(" ", $arrayquantity_ex);

        // MONTANT PRODUIT
        $arraymontant_prod = array();
        $tabmontant_prod = explode(',',  $request->montant_prod);
        for($i=0;$i<count($tabmontant_prod); $i++){
            if(strlen($tabmontant_prod[$i])>0){
                array_push($arraymontant_prod, $tabmontant_prod[$i]);
            }
        }
        $montant_prod = implode(" ", $arraymontant_prod);

        // MONTANT ACTE
        $arraymontant_act = array();
        $tabmontant_act = explode(',',  $request->montant_act);
        for($i=0;$i<count($tabmontant_act); $i++){
            if(strlen($tabmontant_act[$i])>0){
                array_push($arraymontant_act, $tabmontant_act[$i]);
            }
        }
        $montant_act = implode(" ", $arraymontant_act);

        // MONTANT EXAMEN
        $arraymontant_ex = array();
        $tabmontant_ex = explode(',',  $request->montant_ex);
        for($i=0;$i<count($tabmontant_ex); $i++){
            if(strlen($tabmontant_ex[$i])>0){
                array_push($arraymontant_ex, $tabmontant_ex[$i]);
            }
        }
        $montant_ex = implode(" ", $arraymontant_ex);

        // COUT MISE EN OBSERVATION
        $cout_mise_en_observation = 0;
        if($request->cout_mise_en_observation !=''){
            $cout_mise_en_observation = $request->cout_mise_en_observation;
        }

        // COUT EVACUATION
        $cout_evacuation = $request->cout_evacuation;

        // AGE PATIENT
        $age = $request->age;
        $birth_date_item = $request->birth_date_item;
        $age_patient = $this->getBirthDate($age, $birth_date_item);

        try{
            // ENREGISTREMENT DE LA FACTURE
            DB::table('feuille_soin')->insertOrIgnore([
                // GENERAL
                'id' => Time(),
                'nom_patient'=>$request->nom_patient,
                'village'=>$request->village_patient,
                'distance_village'=>$request->distance_village_patient,
                'age_patient'=>$age_patient,
                'sex' => $request->sexe_patient,
                'parent_name'=>$request->parent_patient,
                'tel'=>$request->num_telephone,
                'visit_date' => $request->consultation_date,
                'serie_number' => $request->serie_number,
                'registre_number' => $request->registre_number,
                'consultation_type' => $request->patient_type,
                'type_prestation' => $request->type_prestation,

                // PRODUCT
                'liste_prod' => $liste_prod,
                'quantity_prod' => $quantity_prod,
                'montant_prod' => $montant_prod,
                'cout_total_prod' => (double) $request->cout_total_prod,

                // ACTE
                'liste_act' => $liste_act,
                'quantity_act' => $quantity_act,
                'montant_act' => $montant_act,
                'cout_total_act' => (double) $request->cout_total_act,

                // EXAMEN
                'liste_ex' => $liste_ex,
                'quantity_ex' => $quantity_ex,
                'montant_ex' => $montant_ex,
                'cout_total_ex' => (double) $request->cout_total_ex,

                // OBSERVATION
                'type_observation'=>(double) $request->type_observation,
                'nbre_jours' => (double) $request->nbre_jours,
                'cout_mise_en_observation' => (double) $request->observation_montant,

                // EVACUATION
                'cout_evacuation' => (double) $request->evacuation_montant,

                // GERANT / PRESCRIPTEUR
                'nom_prescripteur' => $request->name_prescripteur,
                'contact_prescripteur' => $request->contact_prescripteur,
                'qualification_prescripteur' => $request->qualification_prescripteur,
                'name_gerant' => $request->name_gerant,
                'contact_gerant' => $request->contact_gerant,
                'user_id' => $request->user()->id,
                'id_structure' => $request->user()->structure_id,
            ]);
        }
        catch(\Exception $e){
            return response()->json(['success'=>false, 'message'=>'Une erreur est survenue lors de l\'enregistrement de la facture.', 'error'=>$e->getMessage()]);
        }

        return response()->json(['success'=>true, 'message'=>'Facture enregistrée avec succès']);
    }
}
