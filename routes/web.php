<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Dashboard\DriverDashboardController;
use App\Http\Controllers\Master\BalanceController;
use App\Http\Controllers\Master\LoadingController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    //Saldos
    Route::resource('balance', BalanceController::class)->names('master.balance');

    //Carregamentos
    Route::resource('loadings', LoadingController::class)->names('admin.loadings');
});

