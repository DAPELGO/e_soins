<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Structure;
use App\Models\Valeur;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StructureController extends Controller
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
        $structures = Structure::where('is_delete', false)->get();
        // $structures = DB::table('structures')
                                // ->join('valeurs', 'valeurs.id', 'structures.id_typestructure')
                                // ->select('structures.*', 'valeurs.libelle as libelle_type')
                                // ->where('structures.is_delete', FALSE)
                                // ->get();
        return view('structures.index', compact('structures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $valeurs = Valeur::where(['id_parametre'=>env('TYPESTRUCTURE'), 'is_delete'=>FALSE])->get();
        return view('structures.create', compact('valeurs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nom_structure'=>'required',
        ]);

        $parent_id = 0;
        if($request->paraent_id != NULL){
            $parent_id = $request->paraent_id;
        }
        Structure::create([
            'id_typestructure'=>$request->id_typestructure,
            'parent_id'=>$parent_id,
            'nom_structure'=>$request->nom_structure,
            'description_structure'=>$request->description_structure,
        ]);

        return redirect()->route('structures.index');
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
