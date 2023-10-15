<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livre;
use App\Models\Exercice;
use App\Models\Valeur;
use App\Models\Solde;
use App\Models\Structure;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LivreController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->can('livres.view')) {
            $livres = Livre::where('is_delete', FALSE)->get();
            $livres = DB::table('livres')
                                ->join('exercices', 'exercices.id', 'livres.exercice_id')
                                ->join('eview_param_type_operation', 'eview_param_type_operation.id', 'livres.id_type_operation')
                                ->join('eview_param_libelle_operation', 'eview_param_libelle_operation.id', 'livres.id_libelle')
                                ->select('livres.*', 'exercices.libelle as libelle_exercice', 'eview_param_type_operation.libelle as libelle_type_operation', 'eview_param_libelle_operation.libelle as libelle_operation')
                                ->where('livres.is_delete', FALSE)
                                ->get();
            return view('livres.index', compact("livres"));
        }else{
            return redirect(route('app.home'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->can('livres.create')) {
            $livres = Livre::where('is_delete', FALSE)->get();
            $exercice = Exercice::where('is_delete', FALSE)->latest()->first();
            $valeur = DB::table('users')
                                ->join('structures', 'structures.id', 'users.structure_id')
                                ->join('valeurs', 'valeurs.id', 'structures.id_typestructure')
                                ->select('valeurs.*')
                                ->where('users.id', Auth::user()->id)
                                ->first();
            $solde = DB::table('livres')
                                ->join('soldes', 'soldes.livre_id', 'livres.id')
                                ->select('soldes.*')
                                ->where('livres.id_user_created', Auth::user()->id)
                                ->latest()
                                ->first();
            // dd($solde);
            $types = Valeur::where(['is_delete'=>FALSE, 'id_parametre'=>env('TYPEOPERATION')])->get();
            $categories = Valeur::where(['is_delete'=>FALSE, 'id_parametre'=>env('CATEGORIE')])->get();
            $libelles = Valeur::where(['is_delete'=>FALSE, 'id_parametre'=>env('LIBELLEOPERATION')])->get();
            $actions = Valeur::where(['is_delete'=>FALSE, 'id_parametre'=>env('ACTIONOPERATION')])->get();
            $devers = Valeur::where(['is_delete'=>FALSE, 'id_parametre'=>env('DEVERS')])->get();
            $livres = Valeur::where(['is_delete'=>FALSE, 'id_parametre'=>env('LIVRE')])->get();
            $typeevacuations = Valeur::where(['is_delete'=>FALSE, 'id_parametre'=>env('TYPEEVACUATION')])->get();
            $structures = Structure::where('is_delete', FALSE)->get();
            return view('livres.create', compact("livres", "exercice", "valeur", "solde", "types", "categories", "libelles", "actions", "devers", "livres", "typeevacuations", "structures"));
        }else{
            return redirect(route('app.home'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->can('livres.create')) {
            $exercice = Exercice::where('is_delete', FALSE)->latest()->first();
            switch ($request->id_typestructure) {
                case env('TYPESTRUCTURE_CSPS'):
                    $this->validate($request, [
                        'id_type_operation' => 'required',
                        'id_categorie' => 'required|',
                        'id_libelle' => 'required',
                        'designation' => 'required',
                        'id_de_vers' => 'required',
                    ]);

                    $livre = Livre::create([
                        'exercice_id' => $exercice->id,
                        'id_type_operation' => $request->id_type_operation,
                        'id_categorie' => $request->id_categorie,
                        'id_libelle' => $request->id_libelle,
                        'designation' => $request->designation,
                        'action_livre' => $request->action_livre,
                        'id_de_vers' => $request->id_de_vers,
                        'montant_livre' => $request->montant_livre,
                        'type_structure' => env('TYPESTRUCTURECSPS'),
                        'description_livre' => $request->description_livre,
                        'id_user_created' => Auth::user()->id,
                    ]);

                    break;
                case env('TYPESTRUCTURE_CMA'):
                    // dd($request);
                    $this->validate($request, [
                        'livre_id' => 'required',
                        'num_enregistrement' => 'required',
                        'ref_piece_justificative' => 'required',
                        'id_type_operation' => 'required',
                        'id_categorie' => 'required',
                        'id_libelle' => 'required',
                        'designation' => 'required',
                        'id_type_evacuation' => 'required',
                        'id_structure_evacuation' => 'required',
                        'nom_prenom_patient' => 'required',
                        'age_patient' => 'required',
                        'id_de_vers' => 'required',
                        'montant_livre' => 'required',
                    ]);

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
                        'id_user_created' => Auth::user()->id,
                    ]);
                    break;

                default:
                    # code...
                    break;
            }

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

            return redirect(route('livres.index'));
        }else{
            return redirect(route('app.home'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
