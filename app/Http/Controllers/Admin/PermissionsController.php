<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return view('admin.spatie.permission.index', ['permissions' => $permissions]);
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

        return redirect()->route('admin.permissions.index');
    }


    public function show($id)
    {
        $permission = Permission::find($id);
        return view('admin.spatie.permission.show', ['permission' => $permission]);
    }
    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        $permission = Permission::find($id);
        $permission->delete();

        return redirect()->route('admin.permissions.index');
    }
}
