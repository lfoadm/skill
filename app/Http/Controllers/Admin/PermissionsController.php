<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:superadmin']);
    }

    public function index()
    {
        $permissions = Permission::paginate(9);
        return view('admin.spatie.permission.index', compact('permissions'));
    }

    public function create()
    {
        return view('admin.spatie.permission.create');
    }

    public function store(Request $request)
    {
        $permission = new Permission();
        $permission->name = $request->name;
        $permission->save();

        return redirect()->route('admin.permissions.index')->with('success', 'Permissão criada com sucesso!');
    }


    public function show($id)
    {
        $permission = Permission::find($id);
        return view('admin.spatie.permission.show', compact('permission'));
    }
    
    public function edit($id)
    {
        $permission = Permission::find($id);
        return view('admin.spatie.permission.edit', compact('permission'));
    }

    public function update(Request $request, $id)
    {
        $permission = Permission::find($id);
        $permission->name = $request->name;
        $permission->save();
        return redirect()->route('admin.permissions.index')->with('success', 'Permissão atualizada com sucesso!');;
    }

    public function destroy($id)
    {
        $permission = Permission::find($id);
        $permission->delete();
        return redirect()->route('admin.permissions.index')->with('danger', 'Permissão apagada com sucesso!');
    }
}
