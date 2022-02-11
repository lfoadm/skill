<?php

use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Route;

//Route::get('', [HomeController::class, 'index'])->name('home');
Route::get('buceta', function(){
    return "bucetuda";
})->name('buceta');