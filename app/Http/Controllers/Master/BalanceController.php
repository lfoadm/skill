<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\Loading;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BalanceController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $balance = $user->balance;
        $cargas = Loading::where('user_id', $user->id);
        $totalPrice = $cargas->sum('totalPrice');
        $comission = $totalPrice * 0.12;
        //dd($comission);

        return view('admin.app.balance.index', compact('balance', 'user', 'totalPrice', 'comission'));
    }

}
