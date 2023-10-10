<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Valeur;
use App\Models\Livre;
use App\Models\CreanceDette;
use App\Models\Exercice;
use App\Models\Paiement;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Illuminate\Validation\ValidationException;
use \stdClass;

class eFluxController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    // TYPE STRUCTURE
    public function dataSelect(String $parametre)
    {
        $valeurs = new StdClass();
        switch ($parametre) {
            // TYPE STRUCTURE
            case 'type-structure':
                $valeurs = Valeur::where(['is_delete'=>FALSE, 'id_parametre'=>env('TYPESTRUCTURE')])->get();
                break;
            // PRESTATIONS
            case 'prestations':
                $valeurs = Valeur::where(['is_delete'=>FALSE, 'id_parametre'=>env('PARAM_CIBLE')])->get();
                break;
            // TYPE STRUCTURE CMA
            case 'type-structure-cma':
                $valeurs = Valeur::where(['is_delete'=>FALSE, 'id_parametre'=>env('TYPESTRUCTURE_CMA')])->get();
                break;
            // TYPE OPERATION
            case 'type-operation':
                $valeurs = Valeur::where(['is_delete'=>FALSE, 'id_parametre'=>env('TYPEOPERATION')])->get();
                break;
            // LIBELLE OPERATION
            case 'libelle-operation':
                $valeurs = Valeur::where(['is_delete'=>FALSE, 'id_parametre'=>env('LIBELLEOPERATION')])->get();
                break;
            // CATEGORIE OPERATION
            case 'categorie-operation':
                $valeurs = Valeur::where(['is_delete'=>FALSE, 'id_parametre'=>env('CATEGORIE')])->get();
                break;
            // ACTION OPERATION
            case 'action-operation':
                $valeurs = Valeur::where(['is_delete'=>FALSE, 'id_parametre'=>env('ACTIONOPERATION')])->get();
                break;
            // DE VERS
            case 'devers':
                $valeurs = Valeur::where(['is_delete'=>FALSE, 'id_parametre'=>env('DEVERS')])->get();
                break;
            // TYPE OPERATION CREANCE OU DETTE
            case 'type-operation-creandette':
                $valeurs = Valeur::where(['is_delete'=>FALSE, 'id_parametre'=>env('TYPEOPCREADETTE')])->get();
                break;
            // TYPE CREANCE
            case 'type-creance':
                $valeurs = Valeur::where(['is_delete'=>FALSE, 'id_parametre'=>env('TYPECREANCE')])->get();
                break;
            // TYPE DETTE
            case 'type-dette':
                $valeurs = Valeur::where(['is_delete'=>FALSE, 'id_parametre'=>env('TYPEDETTE')])->get();
                break;
            // LIVRE
            case 'livre':
                $valeurs = Valeur::where(['is_delete'=>FALSE, 'id_parametre'=>env('LIVRE')])->get();
                break;
            // TYPE EVACUATION
            case 'type-evacuation':
                $valeurs = Valeur::where(['is_delete'=>FALSE, 'id_parametre'=>env('TYPEEVACUATION')])->get();
                break;
            // SORTIE CAISSE
            case 'sortie-caisse':
                $valeurs = Valeur::where(['is_delete'=>FALSE, 'id_parametre'=>env('SORTIECAISSE')])->get();
                break;
            // SORTIE BANQUE
            case 'sortie-banque':
                $valeurs = Valeur::where(['is_delete'=>FALSE, 'id_parametre'=>env('SORTIEBANQUE')])->get();
                break;
            // ENTREE CAISSE
            case 'entree-caisse':
                $valeurs = Valeur::where(['is_delete'=>FALSE, 'id_parametre'=>env('ENTREECAISSE')])->get();
                break;
            // ENTREE BANQUE
            case 'entree-banque':
                $valeurs = Valeur::where(['is_delete'=>FALSE, 'id_parametre'=>env('ENTREEBANQUE')])->get();
                break;
            // CAISSE VERS BANQUE
            case 'caisse-banque':
                $valeurs = Valeur::where(['is_delete'=>FALSE, 'id_parametre'=>env('CAISSEBANQUE')])->get();
                break;
            // BANQUE VERS CAISSE
            case 'banque-caisse':
                $valeurs = Valeur::where(['is_delete'=>FALSE, 'id_parametre'=>env('BANQUECAISSE')])->get();
                break;
            // EXERCICE
            case 'exercice':
                $valeurs = Exercice::where('is_delete', FALSE)->latest()->first();
                break;

            default:
                # code...
                break;
        }
        return response()->json($valeurs);
    }

    // SAVE DATA SYNCHRONISE
    public function saveData(Request $request, String $paramsave)
    {
        $exercice = Exercice::where('is_delete', FALSE)->latest()->first();
        $datamobiles = $request->json()->all();
        $id_typestructure = $datamobiles['id_typestructure'];
        $datas = $datamobiles['datas'];
        // dd($datas);
        $array_save = array();
        switch ($paramsave) {
            case 'livre':
                if($id_typestructure == env('TYPESTRUCTURE_CSPS')){
                    // dd($request->id_type_operation);
                    foreach ($datas as $data) {
                        $livre = Livre::create([
                            'exercice_id' => 1,
                            'id_type_operation' => $data['id_type_operation'],
                            'id_categorie' => $data['id_categorie'],
                            'id_libelle' => $data['id_libelle'],
                            'designation' => $data['designation'],
                            'action_livre' => $data['action_livre'],
                            'id_de_vers' => $data['id_de_vers'],
                            'montant_livre' => $data['montant_livre'],
                            'type_structure' => $data['type_structure'],
                            'description_livre' => $data['description_livre'],
                            'id_user_created' => 1,
                        ]);

                        // $this->saveSolde($data, $livre);
                        array_push($array_save, $livre->id);
                    }

                }else{
                    $livre = Livre::create([
                        'exercice_id' => $exercice->id,
                        'livre_id' => $request->livre_id,
                        'date_evenement' => date('Y-m-d'),
                        'num_enregistrement' => $request->num_enregistrement,
                        'ref_piece_justificative' => $request->ref_piece_justificative,
                        'id_type_operation' => $request->id_type_operation,
                        'id_categorie' => $request->id_categorie,
                        'id_libelle' => $request->id_libelle,
                        'designation' => $request->designation,
                        'id_type_evacuation' => $request->id_type_evacuation,
                        'id_structure_evacuation' => $request->id_structure_evacuation,
                        'nom_prenom_patient' => $request->nom_prenom_patient,
                        'age_patient' => $request->age_patient,
                        'action_livre' => $request->action_livre,
                        'id_de_vers' => $request->id_de_vers,
                        'montant_livre' => $request->montant_livre,
                        'type_structure' => env('TYPESTRUCTURECMA'),
                        'description_livre' => $request->description_livre,
                        'id_user_created' => $request->id_user_created,
                    ]);
                }


                break;
            case 'creance-dette':
                $id_type_creance = 0;
                $id_type_dette = 0;
                foreach ($datas as $data) {
                    if($data['id_type_creance'] != NULL)
                    {
                        $id_type_creance = $data['id_type_creance'];
                    }

                    if($data['id_type_dette'] != NULL)
                    {
                        $id_type_dette = $data['id_type_dette'];
                    }
                    $creancedette = CreanceDette::create([
                        'exercice_id' => $data['exercice_id'],
                        'structure_id' => $data['structure_id'],
                        'date_reception_facture' => $data['date_reception_facture'],
                        'num_facture' => $data['num_facture'],
                        'id_type_creancedette' => $data['id_type_creancedette'],
                        'type_creancedette' => $data['type_creancedette'],
                        'nom_creancier_debiteur' => $data['nom_creancier_debiteur'],
                        'libelle_creance_dette' => $data['libelle_creance_dette'],
                        'montant_creance_dette' => $data['montant_creance_dette'],
                        'id_type_creance' => $id_type_creance,
                        'id_type_dette' => $id_type_dette,
                        'date_echeance' => $data['date_echeance'],
                        'id_user_created' => $data['id_user_created'],
                    ]);
                    array_push($array_save, $creancedette->id);
                }

                break;
            case 'payment':
                foreach ($datas as $data) {
                    $creancedette = CreanceDette::findOrFail($data['creance_dette_id']);
                    $somme_versee = $data['somme_versee'] + $data['montant_verse'];
                    $somme_restante = $data['somme_restante'] - $data['montant_verse'];
                    $etat_paiement = env('ETATPAIEMENT_ENCOURS');
                    if($somme_versee > $creancedette->montant_creance_dette){
                        $etat_paiement = env('ETATPAIEMENT_SOLDE');
                    }else{
                        $payment = Paiement::create([
                            'creance_dette_id' =>$creancedette->id,
                            'montant_verse' =>$data['montant_verse'],
                            'somme_versee' =>$somme_versee,
                            'somme_restante' =>$somme_restante,
                            'date_paiement' =>$data['date_paiement'],
                            'etat_paiement' =>$etat_paiement,
                        ]);
                        array_push($array_save, $payment->id);
                    }

                }
                break;

            default:
                # code...
                break;
        }
        $response['data'] = $array_save;
        $response['paramsave'] = $paramsave;
        return response()->json($response);
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
            $valeur = DB::table('users')
                                ->join('structures', 'structures.id', 'users.structure_id')
                                ->join('valeurs', 'valeurs.id', 'structures.id_typestructure')
                                ->select('users.*', 'valeurs.libelle as type_structure')
                                ->where('users.email', $request->email)
                                ->first();
            $valeur = json_decode(json_encode($valeur), TRUE);
            $valeur['password'] = $credentials['password'];
            $valeur['flag'] = TRUE;
        }else{
            $valeur['flag'] = FALSE;
        }
        return $valeur;
    }

    public function saveSoldd($data, $livre)
    {
        // SOLDE INITIAL
        if($request->solde_initial_banque != NULL && $request->solde_initial_caisse != NULL){
            Solde::create([
                'livre_id' => $livre->id,
                'solde_caisse' => $request->solde_initial_caisse,
                'solde_banque' => $request->solde_initial_banque,
            ]);
        }

        $solde = DB::table('livres')
                            ->join('soldes', 'soldes.livre_id', 'livres.id')
                            ->select('soldes.*')
                            ->where('livres.id_user_created', Auth::user()->id)
                            ->latest()
                            ->first();

        // GET VALUE
        $montant = $request->montant_livre;
        $id_de_vers = $request->id_de_vers;

        $solde_caisse = $solde->solde_caisse;
        $solde_banque = $solde->solde_banque;
        switch ($request->id_type_operation) {
            case env('IDTYPEOPERATIONRE'):
                if($id_de_vers == env('ENTREECAISSE')){
                    $solde_caisse = $solde_caisse + $montant;
                }else if($id_de_vers == env('ENTREEBANQUE')){
                    $solde_banque = $solde_banque + $montant;
                }
                break;
            case env('IDTYPEOPERATIONDE'):
                if($id_de_vers == env('SORTIECAISSE')){
                    $solde_caisse = $solde_caisse - $montant;
                }else if($id_de_vers == env('SORTIEBANQUE')){
                    $solde_banque = $solde_banque - $montant;
                }
                break;
            case env('IDTYPEOPERATIONMI'):
                if($id_de_vers == env('BANQUECAISSE')){
                    $solde_caisse = $solde_caisse + $montant;
                    $solde_banque = $solde_banque - $montant;
                }else if($id_de_vers == env('CAISSEBANQUE')){
                    $solde_banque = $solde_banque + $montant;
                    $solde_caisse = $solde_caisse - $montant;
                }
                break;

            default:
                # code...
                break;
        }

        Solde::create([
            'livre_id' => $livre->id,
            'solde_caisse' => $solde_caisse,
            'solde_banque' => $solde_banque,
        ]);
    }
}
