<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Tenant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $userCount = User::all()->count();
        $tenantCount = Tenant::all()->count();
        $user = Auth::user();
        $driverPre = User::where('status', '=', 'pre_registred')->count();

        return view('dashboard', [
            'user' => $user,
            'userCount' => $userCount,
            'tenantCount' => $tenantCount,
            'driverPre' => $driverPre,
        ]);
    }

}
