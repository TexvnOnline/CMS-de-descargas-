<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:roles.create')->only(['create','store']);
        $this->middleware('can:roles.index')->only(['index']);
        $this->middleware('can:roles.edit')->only(['edit','update']);
        $this->middleware('can:roles.show')->only(['show']);
        $this->middleware('can:roles.destroy')->only(['destroy']);
    }
    public function index()
    {
       $roles = Role::paginate();
       return view('admin.rol.index', compact('roles'));
    }
    public function create()
    {
        $permissions = Permission::get();
        return view('admin.rol.create', compact('permissions'));
    }
    public function store(Request $request)
    {
        $role = Role::create($request->all());
        $role->permissions()->sync($request->get('permissions'));
        return redirect()->route('roles.edit', $role->id)->with('info','Rol guardado con exito');
    }
    public function show($id)
    {
        
        $rol = Role::find($id);
        return view('admin.rol.show', compact('rol'));
    }
    public function edit($id)
    {
        $rol = Role::find($id);
        $permissions = Permission::get();
        return view('admin.rol.edit', compact('rol','permissions'));
    }
    public function update(Request $request, $id)
    {
        $role = Role::find($id);
        $role->update($request->all());
        $role->permissions()->sync($request->get('permissions'));
        return redirect()->route('roles.edit', $role->id)->with('info','Rol actualizado con exito');
    }
    public function destroy($id)
    {
        $role = Role::find($id)->delete();
        return back()->with('info', 'Eliminado correctamente');
    }
}
