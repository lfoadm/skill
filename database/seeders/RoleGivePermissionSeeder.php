<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleGivePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rolesuperadmin = Role::where('name', '=', 'superadmin')->first();
        $rolesecretaria = Role::where('name', '=', 'secretaria')->first();
        $rolemotorista = Role::where('name', '=', 'motorista')->first();
        
        //SUPERADMIN
        $roles_index = Permission::where('name', '=', 'admin.roles.index')->get();
        $roles_create = Permission::where('name', '=', 'admin.roles.create')->get();
        $roles_edit = Permission::where('name', '=', 'admin.roles.edit')->get();
        $roles_destroy = Permission::where('name', '=', 'admin.roles.destroy')->get();
        $rolesuperadmin->givePermissionTo($roles_index);
        $rolesuperadmin->givePermissionTo($roles_create);
        $rolesuperadmin->givePermissionTo($roles_edit);
        $rolesuperadmin->givePermissionTo($roles_destroy);

        $permissions_index = Permission::where('name', '=', 'admin.permissions.index')->get();
        $permissions_create = Permission::where('name', '=', 'admin.permissions.create')->get();
        $permissions_edit = Permission::where('name', '=', 'admin.permissions.edit')->get();
        $permissions_destroy = Permission::where('name', '=', 'admin.permissions.destroy')->get();
        $rolesuperadmin->givePermissionTo($permissions_index);
        $rolesuperadmin->givePermissionTo($permissions_create);
        $rolesuperadmin->givePermissionTo($permissions_edit);
        $rolesuperadmin->givePermissionTo($permissions_destroy);

        $users_index = Permission::where('name', '=', 'admin.users.index')->get();
        $users_create = Permission::where('name', '=', 'admin.users.create')->get();
        $users_edit = Permission::where('name', '=', 'admin.users.edit')->get();
        $users_destroy = Permission::where('name', '=', 'admin.users.destroy')->get();
        $rolesuperadmin->givePermissionTo($users_index);
        $rolesuperadmin->givePermissionTo($users_create);
        $rolesuperadmin->givePermissionTo($users_edit);
        $rolesuperadmin->givePermissionTo($users_destroy);

        $tenants_index = Permission::where('name', '=', 'admin.tenants.index')->get();
        $tenants_create = Permission::where('name', '=', 'admin.tenants.create')->get();
        $tenants_edit = Permission::where('name', '=', 'admin.tenants.edit')->get();
        $tenants_destroy = Permission::where('name', '=', 'admin.tenants.destroy')->get();
        $rolesuperadmin->givePermissionTo($tenants_index);
        $rolesuperadmin->givePermissionTo($tenants_create);
        $rolesuperadmin->givePermissionTo($tenants_edit);
        $rolesuperadmin->givePermissionTo($tenants_destroy);

        $companies_index = Permission::where('name', '=', 'admin.companies.index')->get();
        $companies_create = Permission::where('name', '=', 'admin.companies.create')->get();
        $companies_edit = Permission::where('name', '=', 'admin.companies.edit')->get();
        $companies_destroy = Permission::where('name', '=', 'admin.companies.destroy')->get();
        $rolesuperadmin->givePermissionTo($companies_index);
        $rolesuperadmin->givePermissionTo($companies_create);
        $rolesuperadmin->givePermissionTo($companies_edit);
        $rolesuperadmin->givePermissionTo($companies_destroy);

        $trucks_index = Permission::where('name', '=', 'admin.trucks.index')->get();
        $trucks_create = Permission::where('name', '=', 'admin.trucks.create')->get();
        $trucks_edit = Permission::where('name', '=', 'admin.trucks.edit')->get();
        $trucks_destroy = Permission::where('name', '=', 'admin.trucks.destroy')->get();
        $rolesuperadmin->givePermissionTo($trucks_index);
        $rolesuperadmin->givePermissionTo($trucks_create);
        $rolesuperadmin->givePermissionTo($trucks_edit);
        $rolesuperadmin->givePermissionTo($trucks_destroy);

        $drivers_index = Permission::where('name', '=', 'admin.drivers.index')->get();
        $drivers_create = Permission::where('name', '=', 'admin.drivers.create')->get();
        $drivers_edit = Permission::where('name', '=', 'admin.drivers.edit')->get();
        $drivers_destroy = Permission::where('name', '=', 'admin.drivers.destroy')->get();
        $rolesuperadmin->givePermissionTo($drivers_index);
        $rolesuperadmin->givePermissionTo($drivers_create);
        $rolesuperadmin->givePermissionTo($drivers_edit);
        $rolesuperadmin->givePermissionTo($drivers_destroy);

        //SECRETÁRIA
        $companies_index = Permission::where('name', '=', 'admin.companies.index')->get();
        $companies_edit = Permission::where('name', '=', 'admin.companies.edit')->get();
        $rolesecretaria->givePermissionTo($companies_index);
        $rolesecretaria->givePermissionTo($companies_edit);

        $trucks_index = Permission::where('name', '=', 'admin.trucks.index')->get();
        $trucks_create = Permission::where('name', '=', 'admin.trucks.create')->get();
        $trucks_edit = Permission::where('name', '=', 'admin.trucks.edit')->get();
        $rolesecretaria->givePermissionTo($trucks_index);
        $rolesecretaria->givePermissionTo($trucks_create);
        $rolesecretaria->givePermissionTo($trucks_edit);

        $drivers_index = Permission::where('name', '=', 'admin.drivers.index')->get();
        $drivers_edit = Permission::where('name', '=', 'admin.drivers.edit')->get();
        $rolesecretaria->givePermissionTo($drivers_index);
        $rolesecretaria->givePermissionTo($drivers_edit);

        //MOTORISTA
        $trucks_index = Permission::where('name', '=', 'admin.trucks.index')->get();
        $trucks_edit = Permission::where('name', '=', 'admin.trucks.edit')->get();
        $rolemotorista->givePermissionTo($trucks_index);
        $rolemotorista->givePermissionTo($trucks_edit);
    }
}
