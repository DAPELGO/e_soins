<?php

namespace App\Http\Controllers;

use App\Models\Structure;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PermissionController extends Controller
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
        if (Auth::user()->can('permissions.view')) {
            $permissions = Permission::where('is_delete', false)->get();
            $structure = Structure::where('id', Auth::user()->structure_id)->first();
            return view('permissions.index', compact('permissions', 'structure'));
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
        if (Auth::user()->can('permissions.create')) {
            $structure = Structure::where('id', Auth::user()->structure_id)->first();
            return view('permissions.create', compact('structure'));
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
        if (Auth::user()->can('permissions.create')) {
            $this->validate($request, [
                'nom_permission'=>'required',
            ]);

            Permission::create([
                'nom_permission'=>$request->nom_permission,
            ]);

            return redirect()->route('permissions.index');
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
        if (Auth::user()->can('permissions.view')) {
            $permission = Permission::where('id', $id)->first();
            $structure = Structure::where('id', Auth::user()->structure_id)->first();
            $roles = DB::table('roles')
                                ->join('permission_role', 'roles.id', 'permission_role.role_id')
                                ->select('roles.*')
                                ->where('permission_role.permission_id', $id)
                                ->get();
            return view('permissions.show', compact('permission', 'roles', 'structure'));
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
        if (Auth::user()->can('permissions.view')) {
            $permission = Permission::where('id', $id)->first();
            $structure = Structure::where('id', Auth::user()->structure_id)->first();
            return view('backend.permissions.edit', compact('permission', 'structure'));
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
        if (Auth::user()->can('permissions.view')) {
            $this->validate($request, [
                'nom_permission'=>'required',
            ]);

            $permission = Permission::where('id', $id)->first();
            $permission->update([
                'nom_permission'=>$request->nom_permission,
            ]);

            return redirect()->route('permissions.index');
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
        if (Auth::user()->can('permissions.delete')) {

            $id = $request->id;
            $permission = Permission::findOrFail($id);
            $permission->update([
                'is_delete' => 1,
            ]);
        }
    }
}
