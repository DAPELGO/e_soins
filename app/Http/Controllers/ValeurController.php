<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Valeur;
use App\Models\Parametre;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ValeurController extends Controller
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
        if (Auth::user()->can('users.view')) {
            $valeurs = DB::table('valeurs')
                                ->join('parametres', 'parametres.id', 'valeurs.id_parametre')
                                ->select('valeurs.*', 'parametres.libelle as libelle_parametre')
                                ->where('valeurs.is_delete', false)
                                ->get();
            return view('valeurs.index', compact('valeurs'));
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
        if (Auth::user()->can('users.create')) {
            $parametres = Parametre::where('is_delete', false)->get();
            $valeurs = Valeur::where('is_delete', false)->get();
        return view('valeurs.create', compact('parametres', 'valeurs'));
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
        if (Auth::user()->can('users.create')) {
            $this->validate($request, [
                'parametre_id'=>'required',
                'nom_valeur'=>'required',
            ]);

            valeur::create([
                'id_parametre'=>$request->parametre_id,
                'id_parent'=>$request->id_parent,
                'libelle'=>$request->nom_valeur,
            ]);

            return redirect()->route('valeurs.index');
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
        if (Auth::user()->can('users.view')) {
            $valeur = Valeur::where('id', $id)->first();
            return view('valeurs.show', compact('valeur'));
        }else{
            return redirect()->route('home');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->can('users.view')) {
            $valeurup = Valeur::where('id', $id)->first();
            $parametres = Parametre::where('is_delete', false)->get();
            $valeurs = Valeur::where('is_delete', false)->get();
            // dd($valeurup);
            return view('valeurs.edit', compact('valeurup', 'parametres', 'valeurs'));
        }else{
            return redirect()->route('home');
        }
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
        if (Auth::user()->can('users.view')) {
            $this->validate($request, [
                'parametre_id'=>'required',
                'nom_valeur'=>'required',
            ]);

            $valeur = Valeur::where('id', $id)->first();
            $valeur->update([
                'id_parametre'=>$request->parametre_id,
                'id_parent'=>$request->id_parent,
                'libelle'=>$request->nom_valeur,
            ]);

            return redirect()->route('valeurs.index');
        }else{
            return redirect()->route('home');
        }
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

    public function delete(Request $request)
    {
        if (Auth::user()->can('users.delete')) {

            $id = $request->id;
            $valeur = valeur::findOrFail($id);
            $valeur->update([
                'is_delete' => 1,
            ]);
        }
    }
}
