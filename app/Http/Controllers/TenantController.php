<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\StoreTenantRequest;
use App\Models\Admin\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;

class TenantController extends Controller
{
    public function index()
    {
        $tenants = Tenant::all();
        return view('admin.tenants.index', ['tenants' => $tenants]);
    }

    public function create()
    {
        return view('admin.tenants.create');
    }

    public function store(StoreTenantRequest $request)
    {
        $tenant = new Tenant();
        $tenant->name = $request->name;
        $tenant->description = $request->description;
        $tenant->save();
        
        return redirect()->route('admin.tenants.index')->with('message', 'Inquilino criado com sucesso!');
    }


    public function edit($id)
    {
        $tenant = Tenant::find($id);
        return view('admin.tenants.edit', ['tenant' => $tenant]);
    }


    public function update(StoreTenantRequest $request, $id)
    {
        $tenant = Tenant::find($id);
        $tenant->name = $request->name;
        $tenant->description = $request->description;
        $tenant->save();
        
        return redirect()->route('admin.tenants.index')->with('updated', 'Inquilino atualizado com sucesso!');
    }



    public function show($id)
    {
        $tenant = Tenant::find($id);
        return view('admin.tenants.show', ['tenant' => $tenant]);
    }

    public function destroy($id)
    {
        $tenant = Tenant::find($id);
        $tenant->delete();

        return redirect()->route('admin.tenants.index')->with('info', 'Inquilino apagado!!!');
    }

    //desativar inquilinos
    public function disable($id)
    {
        $user = Auth::user();
        if($user->hasRole('superadmin'))
        {
            $tenant = Tenant::find($id);
            $tenant->status = false;
            $tenant->save();
        
            return redirect()->route('admin.tenants.index')->with('info', 'Inquilino desativado');
        }
        else
        {
            return redirect()->route('login');
        }
    }

    //ativar usuarios
    public function activate($id)
    {
        $user = Auth::user();
        if($user->hasRole('superadmin'))
        {
            $tenant = Tenant::find($id);
            $tenant->status = true;
            $tenant->save();
            return redirect()->route('admin.tenants.index')->with('message', 'Inquilino ativado!');;
        }
        else
        {
            return redirect()->route('login');
        }
    }

}
