<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PermissionsController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\TenantController;
use Illuminate\Support\Facades\Route;

//Route::get('', [HomeController::class, 'index'])->name('home');
Route::resource('roles', RoleController::class)->names('admin.roles');
Route::resource('permissions', PermissionsController::class)->names('admin.permissions');
Route::post('roles-permissions/{id}', [RoleController::class, 'role_has_permission'])->name('admin.roles_has_permissions');

Route::resource('users', UserController::class)->names('admin.users');
Route::get('users/{user}/disable', [UserController::class, 'disable'])->name('admin.users.disable');
Route::get('users/{user}/enable', [UserController::class, 'enable'])->name('admin.users.enable');
Route::get('users/tenant/disable', [UserController::class, 'disable_tenant'])->name('admin.users.disable_tenant');

//Tenants
Route::resource('tenants', TenantController::class)->names('admin.tenants');
Route::get('tenants/disable/{tenant}', [TenantController::class, 'disable'])->name('admin.tenants.disable');
Route::get('/admin/tenants/activate/{tenant}', [TenantController::class, 'activate'])->name('admin.tenants.activate');

//Perfis
//Route::get('profile/username', [UserController::class, 'disable_tenant'])->name('admin.users.disable_tenant');
Route::resource('profile', ProfileController::class)->names('admin.profile');