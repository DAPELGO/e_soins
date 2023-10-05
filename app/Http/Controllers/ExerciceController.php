<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exercice;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ExerciceController extends Controller
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
        if (Auth::user()->can('exercices.view')) {
            $exercices = Exercice::where('is_delete', false)->get();
            return view('exercices.index', compact('exercices'));
        }else{
            return redirect()->route('app.home');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->can('exercices.create')) {
            return view('exercices.create');
        }else{
            return redirect()->route('app.home');
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
        if (Auth::user()->can('exercices.create')) {
            $this->validate($request, [
                'libelle'=>'required',
                'date_debut'=>'required',
                'date_fin'=>'required',
            ]);

            exercice::create([
                'libelle'=>$request->libelle,
                'date_debut'=>$request->date_debut,
                'date_fin'=>$request->date_fin,
            ]);

            return redirect()->route('exercices.index');
        }else{
            return redirect()->route('app.home');
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
        if (Auth::user()->can('exercices.view')) {
            $exercice = Exercice::where('id', $id)->first();
            $roles = DB::table('roles')
                                ->join('exercice_role', 'roles.id', 'exercice_role.role_id')
                                ->select('roles.*')
                                ->where('exercice_role.exercice_id', $id)
                                ->get();
            return view('exercices.show', compact('exercice', 'roles'));
        }else{
            return redirect()->route('backend.home');
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
        if (Auth::user()->can('exercices.view')) {
            $exercice = Exercice::where('id', $id)->first();
            return view('backend.exercices.edit', compact('exercice'));
        }else{
            return redirect()->route('backend.home');
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
        if (Auth::user()->can('exercices.view')) {
            $this->validate($request, [
                'nom_exercice'=>'required',
            ]);

            $exercice = Exercice::where('id', $id)->first();
            $exercice->update([
                'nom_exercice'=>$request->nom_exercice,
            ]);

            return redirect()->route('exercices.index');
        }

        return redirect()->route('backend.home');
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
        if (Auth::user()->can('exercices.delete')) {

            $id = $request->id;
            $exercice = exercice::findOrFail($id);
            $exercice->update([
                'is_delete' => 1,
            ]);
        }
    }
}
