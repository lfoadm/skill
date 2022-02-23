<?php

namespace App\Http\Controllers;

use App\Models\Admin\Driver;
use App\Models\User;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function index()
    {
        $users = User::where('type', '=', 'driver')->get();
        return view('admin.drivers.index', ['users' => $users]);
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
}
