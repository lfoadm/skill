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
    public function index()
    {
        $user = Auth::user();
        $discharges = Discharges::get();
        $loadings = Loading::get();

        return view('master.loadings.index', compact('loadings', 'user', 'discharges'));
    }

    public function create()
    {
        $user = Auth::user();
        $loadings = Loading::get();
        return view('master.loadings.create', compact('loadings', 'user'));
    }

    public function store(Request $request)
    {
        $loading = new Loading();

        $loading->loadingDate       = $request->loadingDate;
        $loading->product           = $request->product;
        $loading->volume            = $request->volume;
        $loading->place             = $request->place;
        $loading->unitPrice         = $request->unitPrice;
        $loading->totalPrice        = $request->totalPrice;
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

        return redirect()->route('master.loadings.index')->with('success', 'Carregamento efetuado com sucesso!');
    }

    public function edit()
    {
        //
    }
}
