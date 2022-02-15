<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PermissionsController;
use App\Http\Controllers\Admin\RoleController;
use Illuminate\Support\Facades\Route;

//Route::get('', [HomeController::class, 'index'])->name('home');
Route::resource('roles', RoleController::class)->names('admin.roles');
Route::resource('permissions', PermissionsController::class)->names('admin.permissions');
Route::post('roles-permissions/{id}', [RoleController::class, 'role_has_permission'])->name('admin.roles_has_permissions');