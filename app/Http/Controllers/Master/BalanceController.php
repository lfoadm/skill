<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BalanceController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $balance = $user->balance;
        //dd($balance);
        return view('master.balance.index', compact('balance', 'user'));
    }
}
