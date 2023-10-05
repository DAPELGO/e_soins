<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parametre;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ParametreController extends Controller
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
            $parametres = Parametre::where('is_delete', false)->get();
            return view('parametres.index', compact('parametres'));
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
        if (Auth::user()->can('users.create')) {
            $parametres = Parametre::where('is_delete', false)->get();
            return view('parametres.create', compact('parametres'));
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
        if (Auth::user()->can('users.create')) {
            $this->validate($request, [
                'nom_parametre'=>'required',
            ]);

            $parent_id = 0;
            if($request->paraent_id != NULL){
                $parent_id = $request->paraent_id;
            }
            parametre::create([
                'parent_id'=>$parent_id,
                'libelle'=>$request->nom_parametre,
            ]);

            return redirect()->route('parametres.index');
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
        if (Auth::user()->can('users.view')) {
            $parametre = Parametre::where('id', $id)->first();
            return view('app.parametres.show', compact('parametre'));
        }else{
            return redirect()->route('app.home');
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
            $parametre = Parametre::where('id', $id)->first();
            return view('app.parametres.edit', compact('parametre'));
        }else{
            return redirect()->route('app.home');
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
                'nom_parametre'=>'required',
            ]);

            $parametre = Parametre::where('id', $id)->first();
            $parametre->update([
                'libelle'=>$request->nom_parametre,
            ]);

            return redirect()->route('parametres.index');
        }else{
            return redirect()->route('app.home');
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
            $parametre = Parametre::findOrFail($id);
            $parametre->update([
                'is_delete' => 1,
            ]);
        }
    }
}
