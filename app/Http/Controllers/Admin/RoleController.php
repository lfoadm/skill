<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:superadmin']);
    }

    public function index()
    {
        $roles = Role::all();
        return view('admin.web.spatie.role.index', ['roles' => $roles]);
    }

    public function create()
    {
        return view('admin.web.spatie.role.create');
    }

    public function store(Request $request)
    {
        $role = new Role();
        $role->name = $request->name;
        $role->save();

        return redirect()->route('admin.roles.index')->with('success', 'Função criada com sucesso!');
    }

    public function edit($id)
    {
        $role = Role::find($id);
        $permissions = Permission::all();

        $roleindex = $role->permissions->where('name', '=', 'admin.roles.index')->first();
        $rolecreate = $role->permissions->where('name', '=', 'admin.roles.create')->first();
        $roleedit = $role->permissions->where('name', '=', 'admin.roles.edit')->first();
        $roledestroy = $role->permissions->where('name', '=', 'admin.roles.destroy')->first();

        $permissionindex = $role->permissions->where('name', '=', 'admin.permissions.index')->first();
        $permissioncreate = $role->permissions->where('name', '=', 'admin.permissions.create')->first();
        $permissionedit = $role->permissions->where('name', '=', 'admin.permissions.edit')->first();
        $permissiondestroy = $role->permissions->where('name', '=', 'admin.permissions.destroy')->first();

        $userindex = $role->permissions->where('name', '=', 'admin.users.index')->first();
        $usercreate = $role->permissions->where('name', '=', 'admin.users.create')->first();
        $useredit = $role->permissions->where('name', '=', 'admin.users.edit')->first();
        $userdestroy = $role->permissions->where('name', '=', 'admin.users.destroy')->first();

        $tenantindex = $role->permissions->where('name', '=', 'admin.tenants.index')->first();
        $tenantcreate = $role->permissions->where('name', '=', 'admin.tenants.create')->first();
        $tenantedit = $role->permissions->where('name', '=', 'admin.tenants.edit')->first();
        $tenantdestroy = $role->permissions->where('name', '=', 'admin.tenants.destroy')->first();

        $companyindex = $role->permissions->where('name', '=', 'admin.companies.index')->first();
        $companycreate = $role->permissions->where('name', '=', 'admin.companies.create')->first();
        $companyedit = $role->permissions->where('name', '=', 'admin.companies.edit')->first();
        $companydestroy = $role->permissions->where('name', '=', 'admin.companies.destroy')->first();

        $truckindex = $role->permissions->where('name', '=', 'admin.trucks.index')->first();
        $truckcreate = $role->permissions->where('name', '=', 'admin.trucks.create')->first();
        $truckedit = $role->permissions->where('name', '=', 'admin.trucks.edit')->first();
        $truckdestroy = $role->permissions->where('name', '=', 'admin.trucks.destroy')->first();

        $driverindex = $role->permissions->where('name', '=', 'admin.drivers.index')->first();
        $drivercreate = $role->permissions->where('name', '=', 'admin.drivers.create')->first();
        $driveredit = $role->permissions->where('name', '=', 'admin.drivers.edit')->first();
        $driverdestroy = $role->permissions->where('name', '=', 'admin.drivers.destroy')->first();

        return view('admin.web.spatie.role.edit', [
            'role' => $role,
            'permissions' => $permissions,

            'permissionindex' => $permissionindex,
            'permissionedit' => $permissionedit,
            'permissioncreate' => $permissioncreate,
            'permissiondestroy' => $permissiondestroy,

            'roleindex' => $roleindex,
            'roleedit' => $roleedit,
            'rolecreate' => $rolecreate,
            'roledestroy' => $roledestroy,

            'userindex' => $userindex,
            'useredit' => $useredit,
            'usercreate' => $usercreate,
            'userdestroy' => $userdestroy,

            'tenantindex' => $tenantindex,
            'tenantedit' => $tenantedit,
            'tenantcreate' => $tenantcreate,
            'tenantdestroy' => $tenantdestroy,
            
            'companyindex' => $companyindex,
            'companyedit' => $companyedit,
            'companycreate' => $companycreate,
            'companydestroy' => $companydestroy,

            'truckindex' => $truckindex,
            'truckedit' => $truckedit,
            'truckcreate' => $truckcreate,
            'truckdestroy' => $truckdestroy,

            'driverindex' => $driverindex,
            'driveredit' => $driveredit,
            'drivercreate' => $drivercreate,
            'driverdestroy' => $driverdestroy,

        ]);
    }

    public function update(Request $request, $id)
    {
        //dd($request);
    }
    
    public function show($id)
    {
        $role = Role::find($id);
        return view('admin.web.spatie.role.show', ['role' => $role]);
    }

    public function destroy($id)
    {
        $role = Role::find($id);
        $role->delete();

        return redirect()->route('admin.roles.index')->with('danger', 'Função apagada com sucesso!');
    }

    public function role_has_permission(Request $request, $id)
    {
        $role = Role::find($id);
        
        $role_index = Permission::where('name', '=', 'admin.roles.index')->get();
        $role_create = Permission::where('name', '=', 'admin.roles.create')->get();
        $role_edit = Permission::where('name', '=', 'admin.roles.edit')->get();
        $role_destroy = Permission::where('name', '=', 'admin.roles.destroy')->get();
        if($request->indexRoles === 'on') {$role->givePermissionTo($role_index);} else{$role->revokePermissionTo($role_index);}
        if($request->createRoles === 'on') {$role->givePermissionTo($role_create);} else{$role->revokePermissionTo($role_create);}
        if($request->editRoles === 'on') {$role->givePermissionTo($role_edit);} else{$role->revokePermissionTo($role_edit);}
        if($request->destroyRoles === 'on') {$role->givePermissionTo($role_destroy);} else{$role->revokePermissionTo($role_destroy);}

        $permissions_index = Permission::where('name', '=', 'admin.permissions.index')->get();
        $permissions_create = Permission::where('name', '=', 'admin.permissions.create')->get();
        $permissions_edit = Permission::where('name', '=', 'admin.permissions.edit')->get();
        $permissions_destroy = Permission::where('name', '=', 'admin.permissions.destroy')->get();
        if($request->indexPermissions === 'on') {$role->givePermissionTo($permissions_index);} else{$role->revokePermissionTo($permissions_index);}
        if($request->createPermissions === 'on') {$role->givePermissionTo($permissions_create);} else{$role->revokePermissionTo($permissions_create);}
        if($request->editPermissions === 'on') {$role->givePermissionTo($permissions_edit);} else{$role->revokePermissionTo($permissions_edit);}
        if($request->destroyPermissions === 'on') {$role->givePermissionTo($permissions_destroy);} else{$role->revokePermissionTo($permissions_destroy);}

        $users_index = Permission::where('name', '=', 'admin.users.index')->get();
        $users_create = Permission::where('name', '=', 'admin.users.create')->get();
        $users_edit = Permission::where('name', '=', 'admin.users.edit')->get();
        $users_destroy = Permission::where('name', '=', 'admin.users.destroy')->get();
        if($request->indexUsers === 'on') {$role->givePermissionTo($users_index);} else{$role->revokePermissionTo($users_index);}
        if($request->createUsers === 'on') {$role->givePermissionTo($users_create);} else{$role->revokePermissionTo($users_create);}
        if($request->editUsers === 'on') {$role->givePermissionTo($users_edit);} else{$role->revokePermissionTo($users_edit);}
        if($request->destroyUsers === 'on') {$role->givePermissionTo($users_destroy);} else{$role->revokePermissionTo($users_destroy);}

        $tenants_index = Permission::where('name', '=', 'admin.tenants.index')->get();
        $tenants_create = Permission::where('name', '=', 'admin.tenants.create')->get();
        $tenants_edit = Permission::where('name', '=', 'admin.tenants.edit')->get();
        $tenants_destroy = Permission::where('name', '=', 'admin.tenants.destroy')->get();
        if($request->indexTenants === 'on') {$role->givePermissionTo($tenants_index);} else{$role->revokePermissionTo($tenants_index);}
        if($request->createTenants === 'on') {$role->givePermissionTo($tenants_create);} else{$role->revokePermissionTo($tenants_create);}
        if($request->editTenants === 'on') {$role->givePermissionTo($tenants_edit);} else{$role->revokePermissionTo($tenants_edit);}
        if($request->destroyTenants === 'on') {$role->givePermissionTo($tenants_destroy);} else{$role->revokePermissionTo($tenants_destroy);}

        $companies_index = Permission::where('name', '=', 'admin.companies.index')->get();
        $companies_create = Permission::where('name', '=', 'admin.companies.create')->get();
        $companies_edit = Permission::where('name', '=', 'admin.companies.edit')->get();
        $companies_destroy = Permission::where('name', '=', 'admin.companies.destroy')->get();
        if($request->indexCompanies === 'on') {$role->givePermissionTo($companies_index);} else{$role->revokePermissionTo($companies_index);}
        if($request->createCompanies === 'on') {$role->givePermissionTo($companies_create);} else{$role->revokePermissionTo($companies_create);}
        if($request->editCompanies === 'on') {$role->givePermissionTo($companies_edit);} else{$role->revokePermissionTo($companies_edit);}
        if($request->destroyCompanies === 'on') {$role->givePermissionTo($companies_destroy);} else{$role->revokePermissionTo($companies_destroy);}

        $trucks_index = Permission::where('name', '=', 'admin.trucks.index')->get();
        $trucks_create = Permission::where('name', '=', 'admin.trucks.create')->get();
        $trucks_edit = Permission::where('name', '=', 'admin.trucks.edit')->get();
        $trucks_destroy = Permission::where('name', '=', 'admin.trucks.destroy')->get();
        if($request->indexTrucks === 'on') {$role->givePermissionTo($trucks_index);} else{$role->revokePermissionTo($trucks_index);}
        if($request->createTrucks === 'on') {$role->givePermissionTo($trucks_create);} else{$role->revokePermissionTo($trucks_create);}
        if($request->editTrucks === 'on') {$role->givePermissionTo($trucks_edit);} else{$role->revokePermissionTo($trucks_edit);}
        if($request->destroyTrucks === 'on') {$role->givePermissionTo($trucks_destroy);} else{$role->revokePermissionTo($trucks_destroy);}

        $drivers_index = Permission::where('name', '=', 'admin.drivers.index')->get();
        $drivers_create = Permission::where('name', '=', 'admin.drivers.create')->get();
        $drivers_edit = Permission::where('name', '=', 'admin.drivers.edit')->get();
        $drivers_destroy = Permission::where('name', '=', 'admin.drivers.destroy')->get();
        if($request->indexDrivers === 'on') {$role->givePermissionTo($drivers_index);} else{$role->revokePermissionTo($drivers_index);}
        if($request->createDrivers === 'on') {$role->givePermissionTo($drivers_create);} else{$role->revokePermissionTo($drivers_create);}
        if($request->editDrivers === 'on') {$role->givePermissionTo($drivers_edit);} else{$role->revokePermissionTo($drivers_edit);}
        if($request->destroyDrivers === 'on') {$role->givePermissionTo($drivers_destroy);} else{$role->revokePermissionTo($drivers_destroy);}

        return redirect()->route('admin.roles.index')->with('success', 'Permissões atualizadas com sucesso!');
    }
}
