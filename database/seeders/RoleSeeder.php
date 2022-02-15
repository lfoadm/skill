<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'superadmin']);
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'gerente']);
        Role::create(['name' => 'secretaria']);
        Role::create(['name' => 'motorista']);

        Permission::create(['name' => 'admin.roles.index']);
        Permission::create(['name' => 'admin.roles.create']);
        Permission::create(['name' => 'admin.roles.edit']);
        Permission::create(['name' => 'admin.roles.destroy']);

        Permission::create(['name' => 'admin.permissions.index']);
        Permission::create(['name' => 'admin.permissions.create']);
        Permission::create(['name' => 'admin.permissions.edit']);
        Permission::create(['name' => 'admin.permissions.destroy']);

        Permission::create(['name' => 'admin.users.index']);
        Permission::create(['name' => 'admin.users.create']);
        Permission::create(['name' => 'admin.users.edit']);
        Permission::create(['name' => 'admin.users.destroy']);

        Permission::create(['name' => 'admin.tenants.index']);
        Permission::create(['name' => 'admin.tenants.create']);
        Permission::create(['name' => 'admin.tenants.edit']);
        Permission::create(['name' => 'admin.tenants.destroy']);

        Permission::create(['name' => 'admin.companies.index']);
        Permission::create(['name' => 'admin.companies.create']);
        Permission::create(['name' => 'admin.companies.edit']);
        Permission::create(['name' => 'admin.companies.destroy']);

        Permission::create(['name' => 'admin.trucks.index']);
        Permission::create(['name' => 'admin.trucks.create']);
        Permission::create(['name' => 'admin.trucks.edit']);
        Permission::create(['name' => 'admin.trucks.destroy']);

        Permission::create(['name' => 'admin.dashboard.index']);
        Permission::create(['name' => 'admin.dashboard.create']);
        Permission::create(['name' => 'admin.dashboard.edit']);
        Permission::create(['name' => 'admin.dashboard.destroy']);

        Permission::create(['name' => 'admin.profile.index']);
        Permission::create(['name' => 'admin.profile.create']);
        Permission::create(['name' => 'admin.profile.edit']);
        Permission::create(['name' => 'admin.profile.destroy']);
    }

}
