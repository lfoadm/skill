<?php

namespace App\Http\Controllers;

use App\Models\Admin\Driver;
use App\Models\Admin\Tenant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;

class DriverController extends Controller
{
    public function index()
    {
        //$users = User::where('type', '=', 'driver')->get();
        $drivers = Driver::all();
        return view('admin.drivers.index', [
            //'users' => $users,
            'drivers' => $drivers,
        ]);
    }

    public function update(Request $request, $id)
    {
        //dd($request->all());
        $driver = Driver::find($id);
        $driver->cnh = $request->cnh;
        $driver->validityCnh = $request->validityCnh;
        if($request->mopp === null)
        {
            $driver->mopp = 0;
        }
        else
        {
            $driver->mopp = 1;
        }
        $driver->moppNumber = $request->moppNumber;
        $driver->save();

        return redirect()->route('admin.profile.index')->with('message', 'Dados atualizado com sucesso!');
    }

    public function edit($id)
    {
        $driver = Driver::find($id);
        $tenants = Tenant::all();
        return view('admin.drivers.edit', [
            'driver' => $driver,
            'tenants' => $tenants,
        ]);
    }

    //setar mesmo tenant do usuario no motorista
    public function setTenant($id)
    {
        $user = Auth::user();
        if($user->hasRole('superadmin'))
        {
            $driver = Driver::find($id);
            $driver->tenant_id = $driver->user->tenant_id;
            $driver->save();
            return redirect()->route('admin.drivers.index')->with('message', 'Transportador atribuído com sucesso!');
        }
        else
        {
            return redirect()->route('login');
        }
    }
}
