<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\Balance;
use App\Models\Master\Discharges;
use App\Models\Master\Loading;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoadingController extends Controller
{
    protected $model;

    public function __construct(Loading $loading)
    {
        $this->model = $loading;
    }
    public function index()
    {
        $user = Auth::user();
        $discharges = Discharges::get();
        $loadings = $this->model::where('user_id', $user->id);

        return view('admin.app.loadings.index', compact('loadings', 'user', 'discharges'));
    }

    public function create()
    {
        $user = Auth::user();
        $loadings = $this->model::get();
        return view('admin.app.loadings.create', compact('loadings', 'user'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        
        $loading = new Loading();
        $loading->tenant_id         = $user->tenant_id;
        $loading->loadingDate       = $request->loadingDate;
        $loading->product           = $request->product;
        $loading->volume            = $request->volume;
        $loading->place             = $request->place;
        $loading->unitPrice         = $request->unitPrice;
        $loading->totalPrice        = $request->unitPrice * $request->volume;
        $loading->amount            = $request->amount;
        $loading->user_id           = $request->user_id;
        $loading->truck_id          = $request->truck_id;
        $loading->user_id_register  = $request->user_id_register;
        
        if($request->amount)
        {
            $balance = Auth::user()->balance()->firstOrCreate([]);
            $balance->deposit($request->amount);
        }
        $loading->save();

        //dd('aqui');

        return redirect()->route('admin.loadings.index')->with('success', 'Carregamento efetuado com sucesso!');
    }

    public function edit($id)
    {
        $user = Auth::user();
        $loading = $this->model::find($id);
        //dd($loading);
        return view('admin.app.loadings.edit', compact('loading', 'user'));
    }

    public function update(Request $request, $id)
    {
        //dd($request->all());
        $loading = $this->model::find($id);
        $loading->loadingDate       = $request->date->loadingDate;
        $loading->product           = $request->product;
        $loading->volume            = $request->volume;
        $loading->place             = $request->place;
        $loading->unitPrice         = $request->unitPrice;
        $loading->totalPrice        = $request->unitPrice * $request->volume;
        $loading->amount            = $request->amount;
        
        $loading->save();
        return redirect()->route('admin.companies.index')->with('success', 'Carregamento atualizado com sucesso!');
    }
}
