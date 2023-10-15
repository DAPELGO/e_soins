<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CreanceDette;
use App\Models\Exercice;
use App\Models\Valeur;
use App\Models\Paiement;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CreanceDetteController extends Controller
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
        if (Auth::user()->can('creancedettes.view')) {
            $creancedettes = CreanceDette::where('is_delete', FALSE)->get();
            return view('creance-dettes.index', compact("creancedettes"));
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
        if (Auth::user()->can('creancedettes.create')) {
            $exercice = Exercice::where('is_delete', FALSE)->latest()->first();
            $valeur = DB::table('users')
                                ->join('structures', 'structures.id', 'users.structure_id')
                                ->join('valeurs', 'valeurs.id', 'structures.id_typestructure')
                                ->select('valeurs.*', 'structures.nom_structure')
                                ->where('users.id', Auth::user()->id)
                                ->first();
            $types = Valeur::where(['is_delete'=>FALSE, 'id_parametre'=>env('TYPEOPCREADETTE')])->get();
            $typecreances = Valeur::where(['is_delete'=>FALSE, 'id_parametre'=>env('TYPECREANCE')])->get();
            $typedettes = Valeur::where(['is_delete'=>FALSE, 'id_parametre'=>env('TYPEDETTE')])->get();
            return view('creance-dettes.create', compact("exercice", "valeur", "types", "typecreances", "typedettes"));
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
        if (Auth::user()->can('creancedettes.create')) {
            $this->validate($request, [
                'date_reception_facture' => 'required',
                'num_facture' => 'required',
                'id_type_creancedette' => 'required',
                'type_creancedette' => 'required',
                'nom_creancier_debiteur' => 'required',
                'libelle_creance_dette' => 'required',
                'montant_creance_dette' => 'required|numeric',
                'date_echeance' => 'required',
            ]);
            $exercice = Exercice::where('is_delete', FALSE)->latest()->first();

            $id_type_creance = 0;
            $id_type_dette = 0;
             if($request->id_type_creance != NULL)
             {
                $id_type_creance = $request->id_type_creance;
             }

             if($request->id_type_dette != NULL)
             {
                $id_type_dette = $request->id_type_dette;
             }
            CreanceDette::create([
                'exercice_id' => $exercice->id,
                'structure_id' => Auth::user()->structure_id,
                'date_reception_facture' => $request->date_reception_facture,
                'num_facture' => $request->num_facture,
                'id_type_creancedette' => $request->id_type_creancedette,
                'type_creancedette' => $request->type_creancedette,
                'nom_creancier_debiteur' => $request->nom_creancier_debiteur,
                'libelle_creance_dette' => $request->libelle_creance_dette,
                'montant_creance_dette' => $request->montant_creance_dette,
                'id_type_creance' => $id_type_creance,
                'id_type_dette' => $id_type_dette,
                'date_echeance' => $request->date_echeance,
                'id_user_created' => Auth::user()->id,
            ]);
            return redirect(route('creancedettes.index'));
        }else{
            return redirect(route('app.home'));
        }
    }

    public function payment(String $id)
    {
        if (Auth::user()->can('creancedettes.create')) {
            $creancedette = CreanceDette::findOrFail($id);
            $montant_verse = Paiement::where(['is_delete'=>FALSE, 'creance_dette_id'=>$creancedette->id])->sum('montant_verse');
            $paiements = Paiement::where(['is_delete'=>FALSE, 'creance_dette_id'=>$creancedette->id])->get();
            $exercice = Exercice::where('is_delete', FALSE)->latest()->first();
            $valeur = DB::table('users')
                                    ->join('structures', 'structures.id', 'users.structure_id')
                                    ->join('valeurs', 'valeurs.id', 'structures.id_typestructure')
                                    ->select('valeurs.*', 'structures.nom_structure')
                                    ->where('users.id', Auth::user()->id)
                                    ->first();
            $total_restant = $creancedette->montant_creance_dette;
            $toal_verse = 0;
            if(count($paiements)>0){
                $toal_verse = $montant_verse;
                $total_restant = $creancedette->montant_creance_dette - $toal_verse;
            }

            return view('creance-dettes.payment', compact("creancedette", "paiements", "exercice", "valeur","toal_verse", "total_restant" ));
        }else{
            return redirect(route('app.home'));
        }
    }

    public function payer(Request $request, String $id)
    {
        if (Auth::user()->can('creancedettes.create')) {
            $this->validate($request, [
                'montant_verse' => 'required',
                'date_paiement' => 'required',
            ]);

            $creancedette = CreanceDette::findOrFail($id);
            $somme_versee = $request->somme_versee + $request->montant_verse;
            $somme_restante = $request->somme_restante - $request->montant_verse;
            $etat_paiement = env('ETATPAIEMENT_ENCOURS');
            if($somme_versee > $creancedette->montant_creance_dette){
                $etat_paiement = env('ETATPAIEMENT_SOLDE');
            }else{
                Paiement::create([
                    'creance_dette_id' =>$creancedette->id,
                    'montant_verse' =>$request->montant_verse,
                    'somme_versee' =>$somme_versee,
                    'somme_restante' =>$somme_restante,
                    'date_paiement' =>$request->date_paiement,
                    'etat_paiement' =>$etat_paiement,
                ]);
            }

            return redirect(route('creancedette.payment', $creancedette->id));
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
