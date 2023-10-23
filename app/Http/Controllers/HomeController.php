<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Acte;
use App\Models\Examen;
use App\Models\Valeur;
use App\Models\Patient;
use App\Models\Product;
use App\Models\Nproduct;
use App\Models\Org_unit;
use App\Models\Structure;
use App\Models\Equipement;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $structure = Structure::where('id', Auth::user()->structure_id)->first();
        return view('home')->with('structure', $structure);
    }

    public function getStat()
    {
        $total_med = 0;
        $total_act = 0;
        $total_eq = 0;
        $total_obs = 0;
        $total_ev = 0;
        $total_facture = 0;

        $structure = Structure::where('id', Auth::user()->structure_id)->first();
        $user = DB::table('users')
                        ->join('structures', 'users.structure_id', 'structures.id')
                        ->select('users.*', 'structures.nom_structure', 'structures.level_structure')
                        ->where('users.id', Auth::user()->id)
                        ->first();

        switch ($user->level_structure) {
            case env ('LEVEL_NATIONAL'):
                $structs = $structure->getAllChildren();
                $array = array();
                foreach ($structs as $struct) {
                    array_push($array, $struct->id);
                }


                $consults = DB::table('feuille_soin')
                                    ->join('structures', 'structures.id', 'feuille_soin.id_structure')
                                    ->whereIn('structures.id', $array)
                                    ->where('feuille_soin.is_delete', false)
                                    ->get();
                $total_med = $consults->sum('cout_total_prod');
                $total_act = $consults->sum('cout_total_act');
                $total_eq = $consults->sum('cout_total_ex');
                $total_obs = $consults->sum('cout_mise_en_observation');
                $total_ev = $consults->sum('cout_evacuation');
                $total_facture = count($consults);
                break;
            case env('LEVEL_DRS'):
                $structs = $structure->getAllChildren();
                $array = array();
                foreach ($structs as $struct) {
                    array_push($array, $struct->id);
                }

                $consults = DB::table('feuille_soin')
                                    ->join('structures', 'structures.id', 'feuille_soin.id_structure')
                                    ->whereIn('structures.id', $array)
                                    ->where('feuille_soin.is_delete', false)
                                    ->get();
                $total_med = $consults->sum('cout_total_prod');
                $total_act = $consults->sum('cout_total_act');
                $total_eq = $consults->sum('cout_total_ex');
                $total_obs = $consults->sum('cout_mise_en_observation');
                $total_ev = $consults->sum('cout_evacuation');
                $total_facture = count($consults);
                break;
            case env('LEVEL_DISTRICT'):
                $structs = $structure->getAllChildren();
                $array = array();
                foreach ($structs as $struct) {
                    array_push($array, $struct->id);
                }

                $consults = DB::table('feuille_soin')
                                    ->join('structures', 'structures.id', 'feuille_soin.id_structure')
                                    ->whereIn('structures.id', $array)
                                    ->where('feuille_soin.is_delete', false)
                                    ->get();
                $total_med = $consults->sum('cout_total_prod');
                $total_act = $consults->sum('cout_total_act');
                $total_eq = $consults->sum('cout_total_ex');
                $total_obs = $consults->sum('cout_mise_en_observation');
                $total_ev = $consults->sum('cout_evacuation');
                $total_facture = count($consults);
                break;
            default:
                $consults = DB::table('feuille_soin')
                                ->where('user_id', Auth::user()->id)
                                ->where('is_delete', false)
                                ->get();
                $total_med = $consults->sum('cout_total_prod');
                $total_act = $consults->sum('cout_total_act');
                $total_eq = $consults->sum('cout_total_ex');
                $total_obs = $consults->sum('cout_mise_en_observation');
                $total_ev = $consults->sum('cout_evacuation');
                $total_facture = count($consults);
                break;
        }

        $response['data'] = array('total_med'=>floatval(round($total_med)), 'total_act'=>floatval(round($total_act)), 'total_eq'=>floatval(round($total_eq)), 'total_obs'=>floatval(round($total_obs)), 'total_ev'=>floatval(round($total_ev)), 'total_facture' => $total_facture);
        return response()->json($response);
    }

    //LOAD FILTER DATA
    public function getFilterData(Request $request){
        if($request->load_type == 'drs'){
            $structures = Structure::where(['is_delete'=>FALSE, 'level_structure'=>env('LEVEL_DRS')])->get();
        }
        else if($request->load_type == 'ds'){
            $user_structure = Structure::where('id', Auth::user()->structure_id)->first();
            $structures = Structure::where(['is_delete'=>FALSE, 'level_structure'=>env('LEVEL_DISTRICT'), 'parent_id'=>$user_structure->id])->get();
        }
        else if($request->load_type == 'fs'){
            $user_structure = Structure::where('id', Auth::user()->structure_id)->first();
            $structures = Structure::where(['is_delete'=>FALSE, 'parent_id'=>$user_structure->id])->get();
        }

        if($structures){
            foreach ($structures as $structure)
            {
                $array[] = array("id" => $structure->id, "nom_structure" => $structure->nom_structure);
            }
            $response['data'] = $array;
            return response()->json($response);
        }
        else{
            $response['data'] = array("id" => '', "nom_structure" => '');
        }
    }

    // FILTER DATA
    public function dataFilter(Request $request)
    {
        // INIT VALUE
        $total_med = 0;
        $total_act = 0;
        $total_eq = 0;
        $total_obs = 0;
        $total_ev = 0;

        // STRUCTURE SELECT
        $id_drs_filtre = $request->id_drs_filtre;
        $id_district_filtre = $request->id_district_filtre;
        $id_csps_filtre = $request->id_csps_filtre;
        $periode_debut = $request->periode_debut;
        $periode_fin = $request->periode_fin;

        $query = DB::table('feuille_soin')
                            ->join('structures', 'structures.id', 'feuille_soin.id_structure')
                            ->where('feuille_soin.is_delete', false);

        if($id_csps_filtre){
            $query->where('structures.id', $id_csps_filtre);
            $struct_name = Structure::find($id_csps_filtre)->nom_structure;

        }
        elseif(!$id_csps_filtre && $id_district_filtre){
            $structure = Structure::find($id_district_filtre);
            $structures = $structure->getAllChildren();
            $struct_name = $structure->nom_structure;
            $array = array();
            foreach ($structures as $structure) {
                array_push($array, $structure->id);
            }
            $query->whereIn('structures.id', $array);
        }
        elseif(!$id_csps_filtre && !$id_district_filtre && $id_drs_filtre){
            $structure = Structure::find($id_drs_filtre);
            $structures = $structure->getAllChildren();
            $struct_name = $structure->nom_structure;
            $array = array();
            foreach ($structures as $structure) {
                array_push($array, $structure->id);
            }
            $query->whereIn('structures.id', $array);
        }
        elseif(!$id_csps_filtre && !$id_district_filtre && !$id_drs_filtre){
            $structure = Structure::where('id', Auth::user()->structure_id)->first();
            $structures = $structure->getAllChildren();
            $struct_name = $structure->nom_structure;
            $array = array();
            foreach ($structures as $structure) {
                array_push($array, $structure->id);
            }
            $query->whereIn('structures.id', $array);
        }

        if($periode_debut && !$periode_fin){
            $query->where('feuille_soin.created_at', '>=', $periode_debut);
        }

        if(!$periode_debut && $periode_fin){
            $query->where('feuille_soin.created_at', '<=', $periode_fin);
        }

        if($periode_debut && $periode_fin){
            $query->whereBetween('feuille_soin.created_at', [$periode_debut, $periode_fin]);
        }

        $consults = $query->get();

        if($periode_debut && $periode_fin){
            $nom_structure = $struct_name.' (Du '.Carbon::parse($periode_debut)->format('d/m/Y').' au '.Carbon::parse($periode_fin)->format('d/m/Y').')';
        }
        elseif($periode_debut && !$periode_fin){
            $nom_structure = $struct_name.' (Du '.Carbon::parse($periode_debut)->format('d/m/Y').' au '.Carbon::now()->format('d/m/Y').')';
        }
        elseif(!$periode_debut && $periode_fin){
            $nom_structure = $struct_name.' (Du '.Carbon::now()->format('d/m/Y').' au '.Carbon::parse($periode_fin)->format('d/m/Y').')';
        }
        else{
            $nom_structure = $struct_name;
        }

        $total_med = $consults->sum('cout_total_prod');
        $total_act = $consults->sum('cout_total_act');
        $total_eq = $consults->sum('cout_total_ex');
        $total_obs = $consults->sum('cout_mise_en_observation');
        $total_ev = $consults->sum('cout_evacuation');

        $response['data'] = array('total_med'=>floatval(round($total_med)), 'total_act'=>floatval(round($total_act)), 'total_eq'=>floatval(round($total_eq)), 'total_obs'=>floatval(round($total_obs)), 'total_ev'=>floatval(round($total_ev)), 'org_unit_name'=>$nom_structure);
        return response()->json($response);
    }
    // INDEX CONSULTATION
    public function econsultation()
    {
        $structure = Structure::where('id', Auth::user()->structure_id)->first();

        $user = DB::table('users')
                        ->join('structures', 'users.structure_id', 'structures.id')
                        ->select('users.*', 'structures.nom_structure', 'structures.level_structure')
                        ->where('users.id', Auth::user()->id)
                        ->first();

        switch ($user->level_structure) {
            case env ('LEVEL_NATIONAL'):
                $structs = $structure->getAllChildren();
                $array = array();
                foreach ($structs as $struct) {
                    array_push($array, $struct->id);
                }

                $nconsults = DB::table('feuille_soin')->where('feuille_soin.patient_id', '>', 0)->whereIn('structures.id', $array)
                            ->join('patients', 'feuille_soin.patient_id', 'patients.id')
                            ->join('structures', 'feuille_soin.id_structure', 'structures.id')
                            ->select('feuille_soin.*', 'patients.name', 'patients.birth_date')
                            ->orderBy('feuille_soin.created_at', 'desc')
                            ->get();
                break;
            case env('LEVEL_DRS'):
                $structs = $structure->getAllChildren();
                $array = array();
                foreach ($structs as $struct) {
                    array_push($array, $struct->id);
                }

                $nconsults = DB::table('feuille_soin')->where('feuille_soin.patient_id', '>', 0)->whereIn('structures.id', $array)
                            ->join('patients', 'feuille_soin.patient_id', 'patients.id')
                            ->join('structures', 'feuille_soin.id_structure', 'structures.id')
                            ->select('feuille_soin.*', 'patients.name', 'patients.birth_date')
                            ->orderBy('feuille_soin.created_at', 'desc')
                            ->get();
                break;
            case env('LEVEL_DISTRICT'):
                $structs = $structure->getAllChildren();
                $array = array();
                foreach ($structs as $struct) {
                    array_push($array, $struct->id);
                }

                $nconsults = DB::table('feuille_soin')->where('feuille_soin.patient_id', '>', 0)->whereIn('structures.id', $array)
                            ->join('patients', 'feuille_soin.patient_id', 'patients.id')
                            ->join('structures', 'feuille_soin.id_structure', 'structures.id')
                            ->select('feuille_soin.*', 'patients.name', 'patients.birth_date')
                            ->orderBy('feuille_soin.created_at', 'desc')
                            ->get();
                break;
            default:
            $nconsults = DB::table('feuille_soin')->where('feuille_soin.patient_id', '>', 0)->where('feuille_soin.user_id', Auth::user()->id)
                            ->join('patients', 'feuille_soin.patient_id', 'patients.id')
                            ->select('feuille_soin.*', 'patients.name', 'patients.birth_date')
                            ->orderBy('feuille_soin.created_at', 'desc')
                            ->get();
                break;
        }

        $rconsults = DB::table('feuille_soin')->where('patient_id', 0)->orderBy('created_at', 'desc')->get();

        return view('esoins.consultation', compact('rconsults', 'nconsults'));
    }

    // LIST DISPENSATIONS
    public function factures()
    {
        $structure = Structure::where('id', Auth::user()->structure_id)->first();

        $user = DB::table('users')
                        ->join('structures', 'users.structure_id', 'structures.id')
                        ->select('users.*', 'structures.nom_structure', 'structures.level_structure')
                        ->where('users.id', Auth::user()->id)
                        ->first();

        switch ($user->level_structure) {
            case env ('LEVEL_NATIONAL'):
                $structs = $structure->getAllChildren();
                $array = array();
                foreach ($structs as $struct) {
                    array_push($array, $struct->id);
                }

                $nconsults = DB::table('feuille_soin')->whereIn('structures.id', $array)
                            ->join('structures', 'feuille_soin.id_structure', 'structures.id')
                            ->select('feuille_soin.*', 'structures.nom_structure')
                            ->where('feuille_soin.is_delete', false)
                            ->orderBy('feuille_soin.created_at', 'desc')
                            ->get();
                break;
            case env('LEVEL_DRS'):
                $structs = $structure->getAllChildren();
                $array = array();
                foreach ($structs as $struct) {
                    array_push($array, $struct->id);
                }

                $nconsults = DB::table('feuille_soin')->whereIn('structures.id', $array)
                            ->join('structures', 'feuille_soin.id_structure', 'structures.id')
                            ->select('feuille_soin.*', 'structures.nom_structure')
                            ->where('feuille_soin.is_delete', false)
                            ->orderBy('feuille_soin.created_at', 'desc')
                            ->get();
                break;
            case env('LEVEL_DISTRICT'):
                $structs = $structure->getAllChildren();
                $array = array();
                foreach ($structs as $struct) {
                    array_push($array, $struct->id);
                }

                $nconsults = DB::table('feuille_soin')->whereIn('structures.id', $array)
                            ->join('structures', 'feuille_soin.id_structure', 'structures.id')
                            ->select('feuille_soin.*', 'structures.nom_structure')
                            ->where('feuille_soin.is_delete', false)
                            ->orderBy('feuille_soin.created_at', 'desc')
                            ->get();
                break;
            default:
            $nconsults = DB::table('feuille_soin')->where('feuille_soin.user_id', Auth::user()->id)
                            ->join('structures', 'feuille_soin.id_structure', 'structures.id')
                            ->select('feuille_soin.*', 'structures.nom_structure')
                            ->where('feuille_soin.is_delete', false)
                            ->orderBy('feuille_soin.created_at', 'desc')
                            ->get();
                break;
        }

        return view('esoins.dispensations_index', compact('nconsults', 'structure'));
    }


    // CREATE DISPENSATION
    public function addFacture(){
        $structure = Structure::where('id', Auth::user()->structure_id)->first();
        $structures = Structure::where('parent_id', $structure->parent_id)->get();
        $products = Product::all();
        $actes = Acte::all();
        $examens = Examen::all();
        $prestations = Valeur::where(['is_delete'=>FALSE, 'id_parametre'=>env('PARAM_CIBLE')])->get();
        $qualifications = Valeur::where(['is_delete'=>FALSE, 'id_parametre'=>env('PARAM_QUALIFICATION')])->get();
        return view('esoins.dispensations_create', compact('structures', 'products', 'actes', 'structure', 'prestations', 'examens', 'qualifications'));
    }

    //VIEW FACTURE
    public function efiche($id)
    {
        // CONSULTATION
        $consult = DB::table('feuille_soin')
                    ->where('id', $id)
                    ->where('is_delete', false)->first();

        if(!$consult){
            toastr()->error('Cette fiche n\'existe pas');
            return redirect()->route('app.factures');
        }

        // PRESTATIONS
        $prestations = Valeur::where(['is_delete'=>FALSE, 'id_parametre'=>env('PARAM_CIBLE')])->get();

        // SRTUCTURE
        $structure = Structure::where('id', Auth::user()->structure_id)->first();
        $consult_struct = Structure::where('id', $consult->id_structure)->first();

        if($consult_struct->level_structure == env('LEVEL_FS')){
            $csps = $consult_struct;
            $district = Structure::where('id', $csps->parent_id)->first();
            $drs = Structure::where('id', $district->parent_id)->first();
        }
        else if($consult_struct->level_structure == env('LEVEL_DISTRICT')){
            $csps = null;
            $district = $consult_struct;
            $drs = Structure::where('id', $district->parent_id)->first();
        }
        else if($consult_struct->level_structure == env('LEVEL_DRS')){
            $csps = null;
            $district = null;
            $drs = $consult_struct;
        }
        else{
            $csps = null;
            $district = null;
            $drs = $consult_struct;
        }

        //QUALIFICATIONS
        $qualification = Valeur::where('id', $consult->qualification_prescripteur)->first();

        // PRODUITS
        $liste_prod =  explode(" ",$consult->liste_prod);
        $quantity_prod =  explode(" ",$consult->quantity_prod);
        $amount_prod =  explode(" ",$consult->montant_prod);
        $cproducts = Product::whereIn('code_product', $liste_prod)->get();
        if($cproducts->count() != 0){
            $productsMap = $cproducts->keyBy('code_product')->toArray();
            $sortedProducts = array_map(function ($codeProduct) use ($productsMap) {
                return $productsMap[$codeProduct];
            }, $liste_prod);
            $cproducts = collect($sortedProducts);
        }

        // ACTES
        $liste_act =  explode(" ",$consult->liste_act);
        $quantity_act =  explode(" ",$consult->quantity_act);
        $amount_act = explode(" ",$consult->montant_act);
        $actes = Acte::whereIn('code_acte', $liste_act)->get();
        if($actes->count() != 0){
            $actesMap = $actes->keyBy('code_acte')->toArray();
            $sortedActes = array_map(function ($codeActe) use ($actesMap) {
                return $actesMap[$codeActe];
            }, $liste_act);
            $actes = collect($sortedActes);
        }

        // EQUIPEMENT
        $liste_eq = explode(" ",$consult->liste_eq);
        $quantity_eq = explode(" ",$consult->quantity_eq);
        $amount_eq = explode(" ",$consult->montant_ex);
        $examens = Examen::whereIn('code_examen', $liste_eq)->get();
        if($examens->count() != 0){
            $examensMap = $examens->keyBy('code_examen')->toArray();
            $sortedExamens = array_map(function ($codeExamen) use ($examensMap) {
                return $examensMap[$codeExamen];
            }, $liste_eq);
            $examens = collect($sortedExamens);
        }

        $type_prest = Valeur::where('id', $consult->type_prestation)->first();
        $typeprestation = $type_prest ? $type_prest->libelle : '';

        return view('esoins.fiche', compact('consult', 'cproducts', 'actes', 'examens', 'quantity_prod', 'quantity_act', 'quantity_eq', 'amount_prod', 'amount_act', 'amount_eq', 'csps', 'district', 'drs', 'typeprestation', 'structure', 'qualification', 'prestations'));
    }

    //DELETE FACTURE
    public function deleteFacture($id)
    {
        // if (Auth::user()->can('esoins.delete')) {
            try{
                $consult = DB::table('feuille_soin')->where('id', $id)
                                ->update(['is_delete'=>true, 'id_user_deleted'=>Auth::user()->id, 'deleted_at'=>date('Y-m-d H:i:s')]);

                toastr()->success('Suppression effectuée avec succès');
                return redirect()->route('app.factures');
            }
            catch(\Exception $e){
                toastr()->error('Erreur lors de la suppression');
                return redirect()->route('app.factures');
            }
        // }
        // else{
        //     toastr()->error('Vous n\'avez pas les droits nécessaires pour effectuer cette action');
        //     return redirect()->route('app.factures');
        // }
    }

    /******** DISPENSATION ****************** */
    public function dispensation()
    {
        // $ordonnances = DB::table('netsigl')->where('ordonnance_id', '!=', '')->get();
        $nordonnances = DB::table('netsigl')
                                ->join('nproducts', 'netsigl.code_product', 'nproducts.code_product')
                                ->select('netsigl.*', 'nproducts.drd_price', 'nproducts.name')
                                ->where('netsigl.ordonnance_id', '!=', '')
                                ->get();
        $ordonnances = DB::table('netsigl')
                                ->join('products', 'netsigl.code_product', 'products.code_product')
                                ->select('netsigl.*', 'products.prix_drd', 'products.name')
                                ->where('netsigl.ordonnance_id', '!=', '')
                                ->get();
        // $ordonnances = DB::table('netsigl')->where('ordonnance_id', '!=', '')->get();

        return view('esoins.dispensation', compact('nordonnances', 'ordonnances'));
    }

    /**************** SELECT CHARGEMENT DES SOUS TABLES *************************/
    public function selection(Request $request)
    {
        $idparent_val = $request->idparent_val;
        $table = $request->table;

        $array[] = array("id" => '', "name" => '');

        switch ($table) {
            case 'structure':
            $structurees = Structure::where(['is_delete'=>FALSE, 'parent_id'=>$idparent_val])->get();
                foreach ($structurees as $structuree)
                {
                    $array[] = array("id" => $structuree->id, "name" => $structuree->nom_structure);
                }
            break;

            case 'valeur':
                $valeurs = Valeur::where(['is_delete'=>FALSE, 'id_parent'=>$idparent_val])->get();
                foreach ($valeurs as $valeur)
                {
                    $array[] = array("id" => $valeur->id, "name" => $valeur->libelle);
                }
                break;

            case 'arrondissement':
                $arrondissements = Arrondissement::where(['is_delete'=>FALSE, 'id_commune'=>$idparent_val])->get();
                foreach ($arrondissements as $arrondissement)
                {
                    $array[] = array("id" => $arrondissement->id, "name" => $arrondissement->libelle);
                }
                break;
        }

        $response['data'] = $array;
        return response()->json($response);
    }

    /**************** SELECT CHARGEMENT DES SOUS TABLES *************************/

    /**
     * download json data localite
     */
    public function getjson()
    {
        $serie = array();
        $org_units = Org_unit::where('is_delete', FALSE)->where('parent_one', 'like', '%Tenado%')->limit(100)->get();

        $tab = new \StdClass();
        $tab->type = "FeatureCollection";

        foreach ($org_units as $org_unit) {

            // GEOM
            $long = str_replace(',', '.', $org_unit->longitude);
            $lat = str_replace(',', '.', $org_unit->latitude);

            $properties = new \StdClass();
            $properties->code = $org_unit->code;
            $properties->nom = $org_unit->nom;

            $feature = new \StdClass();
            $feature->type = "Feature";
            $feature->properties = $properties;

            $geometrie = new \StdClass();
            $geometrie->type = "Point";
            $geometrie->coordinates = [$long, $lat];
            $feature->geometry = $geometrie;

            $tab->features[] = $feature;
        }

        /************ REGIONS ********************************/
        // $geom = Storage::disk('public')->get('dataville/regions.json');
        $geom = Storage::disk('public')->get('dataville/district.geojson');


        // // JSON
        $json_regions = json_decode($geom, true);
    //    $data = response()->json($json_regions);
    //    dd($data);
        // dd($json_regions);

        // // Regions
        // $regions = $json_regions[0]['row_to_json'];
        $regions = $json_regions;
        /************ END REGIONS ********************************/

        // ORG UNITS
        $orgUnit = json_encode($tab, JSON_NUMERIC_CHECK);

        // REGIONS
        $region = json_encode($regions);

        $data = array('region' => $regions, 'org_unit'=>$orgUnit);

        return json_encode($data, JSON_NUMERIC_CHECK);
    }

    // LISTE OF PRODUCT
    public function ordonnance()
    {
        $nproducts = Nproduct::all();
        return view('esoins.ordannance', compact('nproducts'));
    }

    // SAVE ORDONNANCE
    public function save(Request $request)
    {
        $this->validate($request, [
            'numero' => 'required|unique:netsigl,ordonnance_id',
            'date_dispensation' => 'required',
        ]);
        // $nproducts = Nproduct::all();
        // List prod
        $array_prod = array();
        $tab_prod = explode(',',  $request->liste_prod);
        for($i=0;$i<count($tab_prod); $i++){
            if(strlen($tab_prod[$i])>0){
                array_push($array_prod, $tab_prod[$i]);
            }

        }

        // Quantity prod
        $arrayquantity_prod = array();
        $tabquantity_prod = explode(',',  $request->quantity_prod);
        for($i=0;$i<count($tabquantity_prod); $i++){
            if(strlen($tabquantity_prod[$i])>0){
                array_push($arrayquantity_prod, $tabquantity_prod[$i]);
            }

        }

        $structure = Structure::findOrFail(Auth::user()->structure_id);
        // $product =  explode(",",$request->product);
        // $quantity =  explode(",",$request->quantity);
        // $product_id_list =  explode(",",$request->product_id_list);
        // dd($quantity);
        for($i=0; $i<count($array_prod); $i++){
            $productvalue = $array_prod[$i];
            $quantityvalue = $arrayquantity_prod[$i];
            // dd($quantityvalue);
            DB::insert('insert into netsigl (ordonnance_id, name_product, orgunit_id, orgunit_name, date_dispensation, quantity_product, code_product, user_id) values (?, ?, ?, ?, ?, ?, ?, ?)',
                [$request->numero, '', $structure->code_structure, '', $request->date_dispensation,  $quantityvalue, $productvalue, Auth::user()->id]);
        }
        // dd($arrayquantity_prod);
        // dd($product_id_list);

        // for($i=0; $i<count($quantity); $i++){
            // if(is_null($quantity[$i])){
                // array_splice($quantity, $i, 1);
            // }
        // }

       //  for($i=0; $i<count($request->product); $i++){
            //DB::insert('insert into netsigl (ordonnnce_id, orgunit_id, date_dispensation, drugs_dispensation, orgunit_name, code_product, quantity_product) values (?, ?, ?, ?, ?, ?, ?)',
        // [$request->numero, $request->numero, $request->date_dispensation, '', '', $product[$i], $quantity[$i]]);
        // }


        return redirect()->route('esoins.dispensation');
    }

    // CREATE CONSULTATION
    public function addConsultation(Request $request, $id)
    {
        $patient = Patient::where('id', $id)->first();
        $products = Product::all();
        $actes = Acte::all();
        $examens = Equipement::all();
        $examens = Examen::all();
        $typeprestations = Valeur::where(['is_delete'=>FALSE, 'id_parametre'=>env('PARAM_CIBLE')])->get();
        return view('esoins.add-consultation', compact('patient', 'products', 'actes', 'examens', 'typeprestations', 'examens'));
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

    // STORE CONSULTATION
    public function storeFacture(Request $request)
    {
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

        // AGE PATIENT
        $age = $request->age;
        $birth_date_item = $request->birth_date_item;
        $age_patient = $this->getBirthDate($age, $birth_date_item);

        try{
            // ENREGISTREMENT DE LA FACTURE
            DB::table('feuille_soin')->insertOrIgnore([
                // GENERAL
                'id' => Str::uuid(),
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
                'cout_mise_en_observation' => (double) $request->cout_mise_en_observation,

                // EVACUATION
                'cout_evacuation' => (double) $request->cout_evacuation,

                // GERANT / PRESCRIPTEUR
                'nom_prescripteur' => $request->name_prescripteur,
                'contact_prescripteur' => $request->contact_prescripteur,
                'qualification_prescripteur' => $request->qualification_prescripteur,
                'name_gerant' => $request->name_gerant,
                'contact_gerant' => $request->contact_gerant,
                'user_id' => Auth::user()->id,
                'id_structure' => Auth::user()->structure_id,
            ]);
        }
        catch(\Exception $e){
            //dd($e->getMessage());
            toastr()->error('Erreur d\'enregistrement de la facture');
        }

        toastr()->success('Enregistrement effectué avec succès');
    }

    // STORE CONSULTATION
    public function storeConsultation(Request $request)
    {
        // dd($request->all());
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


        // COUT MISE EN OBSERVATION
        $cout_mise_en_observation = 0;
        if($request->cout_mise_en_observation !=''){
            $cout_mise_en_observation = $request->cout_mise_en_observation;
        }

        // COUT EVACUATION
        $cout_evacuation = 0;

        if($request->nbre_kilometre){
            $cout_evacuation = floatval($request->nbre_kilometre)*120;
        }
        // dd($liste_ex);
        // dd(explode(',',  $request->liste_prod));
        // $patient = Patient::where('id', $request->patient_id)->first();

        $birth_date_unknow = $request->birth_date_unknow;
        $birth_date_item = $request->birth_date_item;
        $age_patient = $this->getBirthDate($birth_date_unknow, $birth_date_item);

        // $diagnostic = implode(" ", $diagnostic);
        // dd($request->cout_total_prod.' '.$request->cout_total_act.' '.$request->cout_tatol_examen);
        DB::table('feuille_soin')->insertOrIgnore([
            // GENERAL
            'id' => Str::uuid(),
            'nom_patient'=>$request->nom_patient,
            'village'=>$request->village_patient,
            'age_patient'=>$age_patient, // ALTER TABLE feuille_soin RENAME COLUMN qualification TO age_patient;
            'sex' => $patient->sexe,
            'mother_name'=>$request->mother_patient,
            'tel'=>$request->num_telephone,
            'visit_date' => $request->consultation_date,
            'serie_number' => $request->serie_number,
            'registre_number' => $request->registre_number,
            'consultation_type' => $request->patient_type,
            'type_prestation' => $request->type_prestation,
            // PRODUCT
            'num_ordonance' => $request->num_ordonance,
            'liste_prod' => $liste_prod,
            'quantity_prod' => $quantity_prod,
            'montant_prod' => $montant_prod, // ALTER TABLE feuille_soin RENAME COLUMN list_examens TO montant_prod;
            'cout_total_prod' => $request->cout_total_prod,
            // ACTE
            'liste_act' => $liste_act,
            'quantity_act' => $quantity_act,
            'montant_act' => $montant_act, // ALTER TABLE feuille_soin RENAME COLUMN nom_prenom TO montant_act;
            'cout_total_act' => $request->cout_total_act,
            // EXAMEN
            'liste_ex' => $liste_ex,
            'quantity_ex' => $quantity_ex,
            'montant_ex' => $montant_ex, // ALTER TABLE feuille_soin RENAME COLUMN type_of_agent TO montant_ex;
            'cout_total_ex' => $request->cout_tatol_ex,
            // OBSERVATION
            'type_observation'=>$request->type_observation, // ALTER TABLE feuille_soin RENAME COLUMN cout_total_ex TO type_observation; ALTER TABLE feuille_soin RENAME COLUMN cout_total_eq TO cout_total_ex;
            'nbre_jours' => $request->nbre_jours,
            'cout_mise_en_observation' => $request->observation_montant,
            // EVACUATION
            'nbre_kilomettre' => $request->nbre_kilometre,
            'cout_evacuation' => $request->evacuation_montant,
            // GERANT / PRESCRIPTEUR
            'nom_agent' => $request->name_gerant, // ALTER TABLE feuille_soin RENAME COLUMN nom_agent TO name_gerant;
            'contact_prescripteur' => $request->contact_prescripteur,
            'name_gerant' => $request->name_gerant,
            'contact_gerant' => $request->contact_gerant,
            'user_id' => Auth::user()->id,
            'id_structure' => Auth::user()->structure_id,
        ]);
    }

    public function checkOrdonnance(Request $request)
    {
        $consult = DB::table('feuille_soin')->where('num_ordonance', $request->numero)->first();
        $liste_prod =  explode(" ",$consult->liste_prod);
        // if($consult->patient_id == 0){
             // $products = Product::whereIn('code_product', $liste_prod)->get();
         // }else{
             // $products = Nproduct::whereIn('uid', $liste_prod)->get();
         // }

        $products = Product::whereIn('code_product', $liste_prod)->get();

        response()->json($products);
        return view("esoins.ckeck-ordonnance", compact("products"));
    }


    public function datanetsigl()
    {
        // sendRequest
        $url = "https://burkinanetsigl.com/api/36/events.json?orgUnit=Ize8xlE9AdQ&program=pYGIlffbGeL&startDate=2023-07-20&endDate=2023-07-26";
        $url = "https://burkinanetsigl.com/api/36/events.json?fields=*&orgUnit=zmSNCYjqQGj&ouMode=DESCENDANTS&program=pYGIlffbGeL&fields=trackedEntityInstance,dataValues[dataElement,value]&lastUpdateDuration=5min&paging=false";

        $username = 'admin';

        $password = 'PQGyzV6LMNUUxSrXz2F-q';

        $ch = curl_init ();

        $headr = array ();

        $headr [] = 'Content-type: application/json';

        $headr [] = 'Authorization: Basic ' . base64_encode ( $username . ":" . $password );

        curl_setopt( $ch, CURLOPT_AUTOREFERER, TRUE );

        curl_setopt ( $ch, CURLOPT_URL, $url );

        curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headr );

        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );

        //curl_setopt ($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC );

        curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, TRUE );

        $data = curl_exec($ch);

        //$body = curl_exec($ch);

        if ($data === false)
        {
            // throw new Exception('Curl error: ' . curl_error($crl));

            print_r ( 'Curl error: ' . curl_error ( $ch ) );
        }
        //else {echo "Connexion reussi".PHP_EOL;}

        curl_close ( $ch );

        $datas = json_decode ( $data );
        $ordonnnce_id = NULL;
        $name_product = NULL;
        $orgunit_id = NULL;
        $orgunit_name = NULL;
        $date_dispensation = NULL;
        $quantity_product = NULL;
        $code_product = NULL;
        $type_transaction = NULL;
        // $drugs_dispensation = NULL;




        // return response()->json($datas);
        for($i=0; $i<count($datas->events); $i++){
            $datae = ($datas->events)[$i];
            // return response()->json($datae);
            $dataElement = $datae->dataValues;
            $k = 0;
            // return response()->json($dataElement);
            for($k=0; $k<count($dataElement); $k++){
                // NUMERO ORDONNANCE
                if($dataElement[$k]->dataElement == env('ordonnnce_id')){
                    $ordonnnce_id = $dataElement[$k]->value;
                }

                // NOM DU PRODUIT
                if($dataElement[$k]->dataElement == env('name_product')){
                    $name_product = $dataElement[$k]->value;
                }

                // ORG UNIT ID
                $orgunit_id = $datae->orgUnit;

                // ORG UNIT NAME
                $orgunit_name = $datae->orgUnitName;

                // DATE DISPENSATION
                if($dataElement[$k]->dataElement == env('date_dispensation')){
                    $date_dispensation = $dataElement[$k]->value;
                }

                // QUANTITE PRODUIT
                if($dataElement[$k]->dataElement == env('quantity_product')){
                    $quantity_product = $dataElement[$k]->value;
                }

                // CODE PRODUIT
                if($dataElement[$k]->dataElement == env('code_product')){
                    $code_product = $dataElement[$k]->value;
                }

                // TYPE TRANSACTION
                if($dataElement[$k]->dataElement == env('type_transaction')){
                    $type_transaction = $dataElement[$k]->value;
                }
            }
            if($type_transaction == 4){
                // dd($code_product);
                $netsigl = DB::table("netsigl")->where('ordonnance_id', $ordonnnce_id)->get();
                // if(count($netsigl)<=0){
                    DB::insert('insert into netsigl (ordonnance_id, name_product, orgunit_id, orgunit_name, date_dispensation, quantity_product, code_product) values (?, ?, ?, ?, ?, ?, ?)',
                    [$ordonnnce_id, $name_product, $orgunit_id, $orgunit_name, $date_dispensation,  $quantity_product, $code_product]);
                // }


            }
            // return response()->json($dataElement);


            // return $datae;
        }
    }
}
