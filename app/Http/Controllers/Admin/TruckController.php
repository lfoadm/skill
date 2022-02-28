<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreTruckRequest;
use App\Models\Admin\Driver;
use App\Models\Admin\Tenant;
use App\Models\Admin\Truck;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TruckController extends Controller
{
    
    public function index()
    {
        $trucks = Truck::all();

        return view('admin.trucks.index', ['trucks' => $trucks]);
    }

    
    public function create()
    {
        $tenants = Tenant::all();
        $drivers = User::where('type', '=', 'driver')->get();
        
        //dd($drivers);
        return view('admin.trucks.create', [
            'tenants' => $tenants,
            'drivers' => $drivers
        ]);
    }

    public function store(StoreTruckRequest $request)
    {
        $truck = new Truck();
        //$truck->tenant_id       = $request->tenant_id;
        $truck->user_id         = $request->user_id;
        $truck->surname         = $request->surname;
        $truck->brand           = $request->brand;
        $truck->model           = $request->model;
        $truck->plate           = $request->plate;
        $truck->yearManufacture = $request->yearManufacture;
        $truck->modelYear       = $request->modelYear;
        $truck->chassis         = $request->chassis;
        $truck->renavan         = $request->renavan;
        $truck->uf              = $request->uf;
        $truck->color           = $request->surname;
        //$truck->status          = 1;
        
        if($request->hasFile('image') && $request->image->isValid())
        {
            $image = $request->file('image');
            $imageName = Carbon::now()->timestamp. '.' . $image->extension();
            $truck->image = $image->storeAs('trucks', $imageName);
            $truck->image = $imageName;
        }
        
        $truck->save();
        
        return redirect()->route('admin.trucks.index')->with('message', 'Veículo cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $truck = Truck::find($id);
        return view('admin.trucks.show', ['truck' => $truck]);

    }

    public function edit($id)
    {
        $truck = Truck::find($id);
        $tenants = Tenant::all();
        $drivers = User::where('type', '=', 'driver')->get();
        
        //dd($truck->user_id);
        return view('admin.trucks.edit', [
            'truck' => $truck,
            'tenants' => $tenants,
            'drivers' => $drivers,
        ]);
    }

    public function update(StoreTruckRequest $request, $id)
    {
        $truck = Truck::find($id);
        $truck->user_id         = $request->user_id;
        $truck->surname         = $request->surname;
        $truck->brand           = $request->brand;
        $truck->model           = $request->model;
        $truck->plate           = $request->plate;
        $truck->yearManufacture = $request->yearManufacture;
        $truck->modelYear       = $request->modelYear;
        $truck->chassis         = $request->chassis;
        $truck->renavan         = $request->renavan;
        $truck->uf              = $request->uf;
        $truck->color           = $request->surname;
        
        if($request->hasFile('image') && $request->image->isValid())
        {
            if($truck->image && Storage::exists('trucks', $truck->image))
            {
                unlink('storage/trucks' . '/' . $truck->image);
            }

            $image = $request->file('image');
            $imageName = Carbon::now()->timestamp. '.' . $image->extension();
            $truck->image = $image->storeAs('trucks', $imageName);
            $truck->image = $imageName;
        }
        
        $truck->save();
        
        return redirect()->route('admin.trucks.index');
    }

    public function destroy($id)
    {
        $truck = Truck::find($id);
        
        if($truck->image && Storage::exists('trucks', $truck->image))
            {
                unlink('storage/trucks' . '/' . $truck->image);
            }
        Truck::destroy($id);
        return redirect()->route('admin.trucks.index')->with('msg', 'Veículo apagado com sucesso!');
    }


    //desativar caminhão
    public function disable($id)
    {
        $user = Auth::user();
        if($user->hasRole('superadmin'))
        {
            $truck = Truck::find($id);
            $truck->status = 0;
            $truck->save();
        
            return redirect()->route('admin.trucks.index');
        }
        else
        {
            return redirect()->route('login');
        }
    }

    //ativar caminhão
    public function enable($id)
    {
        $user = Auth::user();
        if($user->hasRole('superadmin'))
        {
            $truck = Truck::find($id);
            $truck->status = 1;
            $truck->save();
            
            return redirect()->route('admin.trucks.index');
        }
        else
        {
            return redirect()->route('login');
        }
    }
}
