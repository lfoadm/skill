<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Tenant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;

class UserController extends Controller
{
    protected $model;

    public function __construct(User $user)
    {
        $this->middleware(['role:superadmin']);
        $this->model = $user;
    }


    use HasRoles;

    public function index()
    {
        $users = $this->model::where('type', '!=', 'admin')->get();
        //dd($users->HasRole('motorista'));

        return view('admin.web.users.index', ['users' => $users]);
    }

   
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        $user = $this->model::find($id);

        //dd($user);
        
        return view('admin.web.users.show', ['user' => $user]);
    }

    
    public function edit($id)
    {
        $user = $this->model::find($id);
        $tenants = Tenant::all();

        $rolemotorista  = $user->hasRole('motorista');
        $rolesecretaria = $user->hasRole('secretaria');
        $rolegerente    = $user->hasRole('gerente');
        $roleadmin      = $user->hasRole('admin');
        $rolesuperadmin = $user->hasRole('superadmin');

        return view('admin.web.users.edit', [
            'user' => $user,
            'tenants' => $tenants,
            'rolemotorista' => $rolemotorista,
            'rolesecretaria' => $rolesecretaria,
            'rolegerente' => $rolegerente,
            'roleadmin' => $roleadmin,
            'rolesuperadmin' => $rolesuperadmin,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = $this->model::find($id);
        
        if($request->rolemotorista === 'on') {$user->assignRole('motorista');} else{$user->removeRole('motorista');}
        if($request->rolesecretaria === 'on') {$user->assignRole('secretaria');} else{$user->removeRole('secretaria');}
        if($request->rolegerente === 'on') {$user->assignRole('gerente');} else{$user->removeRole('gerente');}
        if($request->roleadmin === 'on') {$user->assignRole('admin');} else{$user->removeRole('admin');}
        if($request->rolesuperadmin === 'on') {$user->assignRole('superadmin');} else{$user->removeRole('superadmin');}

        $user->tenant_id = $request->tenant_id;
        $user->save();
        return redirect()->route('admin.users.index')->with('success', 'Usuário atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    //desativar usuarios
    public function disable($id)
    {
        /* if(Auth::user()->hasRole === null)
        { */
            $user = $this->model::find($id);
            $user->status = 'inactived';
            $user->save();
            
            return redirect()->route('admin.users.index')->with('warning', 'Usuário desabilitado do sistema!');
        /* }
        else
        {
            return redirect()->route('login');
        } */
    }

    //ativar usuarios
    public function enable($id)
    {
        /* if(Auth::user()->hasRole === null)
        { */
            $user = $this->model::find($id);
            $user->status = 'actived';
            $user->save();
            
            return redirect()->route('admin.users.index')->with('success', 'Usuário habilitado com sucesso!');
        /* }
        else
        {
            return redirect()->route('login');
        } */
    }

    


}
