<?php

use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PermissionsController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TruckController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\TenantController;
use Illuminate\Support\Facades\Route;

//Perfis
//Route::get('profile/username', [UserController::class, 'disable_tenant'])->name('admin.users.disable_tenant');
Route::resource('profile', ProfileController::class)->names('admin.profile');


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
Route::get('tenants/activate/{tenant}', [TenantController::class, 'activate'])->name('admin.tenants.activate');

//Companies
Route::resource('companies', CompanyController::class)->names('admin.companies');
Route::get('companies/disable/{company}', [CompanyController::class, 'disable'])->name('admin.companies.disable');
Route::get('companies/enable/{company}', [CompanyController::class, 'enable'])->name('admin.companies.enable');

//Drivers
Route::resource('drivers', DriverController::class)->names('admin.drivers');
Route::get('drivers/setTenant/{driver}', [DriverController::class, 'setTenant'])->name('admin.drivers.setTenant');
#Route::get('drivers/disable/{driver}', [DriverController::class, 'disable'])->name('admin.drivers.disable');
#Route::get('drivers/enable/{driver}', [DriverController::class, 'enable'])->name('admin.drivers.enable');

//Trucks
Route::resource('trucks', TruckController::class)->names('admin.trucks');
Route::get('trucks/disable/{truck}', [TruckController::class, 'disable'])->name('admin.trucks.disable');
Route::get('trucks/enable/{truck}', [TruckController::class, 'enable'])->name('admin.trucks.enable');