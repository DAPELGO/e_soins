<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
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
        if (Auth::user()->can('roles.view')) {
            $roles = Role::where('is_delete', FALSE)->get();
            return view('roles.index', compact('roles'));
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
        if (Auth::user()->can('roles.create')) {
            $permissions =  Permission::where('is_delete', FALSE)->get();
            return view('roles.create', compact('permissions'));
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
        if (Auth::user()->can('roles.create')) {
            $this->validate($request, [
                'nom_role' => 'required|unique:roles',
                'permission' => 'required',
            ]);

            $role = Role::create([
                'nom_role' => $request->nom_role,
                'id_user_created'=>Auth::user()->id,
                'is_delete' => FALSE,
            ]);

            $role->permissions()->sync($request->permission);

            session()->flash('notification.message', 'Rôle créé avec succès !');
            session()->flash('notification.type', 'success');
            session()->flash('notification.title', 'Succès');

            return redirect()->route('roles.index');
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
        if (Auth::user()->can('roless.view')) {

            $role = Role::find($id);
            $users = DB::table('admins')
                                ->join('role_user', 'admins.id', 'role_user.user_id')
                                ->select('admins.*')
                                ->where('role_user.role_id', $id)
                                ->get();
            $permissions = DB::table('permissions')
                                ->join('permission_role', 'permissions.id', 'permission_role.permission_id')
                                ->select('permissions.nom_permission')
                                ->where('permission_role.role_id', $id)
                                ->get();
            return view('backend.roles.show', compact('role', 'users', 'permissions'));
        }

        return redirect(route('backend.home'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->can('roles.update')) {

            $role = Role::find($id);
            $permissions =  Permission::where('is_delete', FALSE)->get();
            return view('roles.edit', compact('role', 'permissions'));
        }

        return redirect(route('backend.home'));
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
        if (Auth::user()->can('roles.update')) {

            $this->validate($request, [
                'nom_role' => 'required'
            ]);

            $role = Role::find($id);
            $role->update([
                'nom_role' =>$request->nom_role,
                'id_user_updated'=>Auth::user()->id,
            ]);

            $role->permissions()->sync($request->permission);

            session()->flash('notification.message', 'Rôle modifié avec succès !');
            session()->flash('notification.type', 'success');
            session()->flash('notification.title', 'Succès');

            return redirect(route('roles.index'));
        }

        return redirect(route('backend.home'));
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
        if (Auth::user()->can('roles.delete')) {

            $id = $request->id;
            $role = Role::findOrFail($id);
            $role->update([
                'id_user_deleted'=>Auth::user()->id,
                'is_delete' => 1,
            ]);

            session()->flash('notification.message', 'Rôle supprimé avec succès !');
            session()->flash('notification.type', 'error');
            session()->flash('notification.title', 'Suppression');
        }
    }
}
