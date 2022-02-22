@extends('adminlte::page')

@section('title', 'Grupo de usuários')

@section('content_header')
<h1>Ajustando atribuições de Usuário</h1>
@stop

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="basic-form">
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label style="font-weight: bolder" for="name">Nome</label><br>
                            <span style="font-style:italic">
                                <h2>{{ $user->name }}</h2>
                            </span>
                        </div>
                        <div class="form-group col-md-4">
                            <label style="font-weight: bolder" for="nome">E-mail</label><br>
                            <span style="font-style:italic">
                                <h4>{{ $user->email }}</h4>
                            </span>
                        </div>
                    </div>
                    <form action="{{ route('admin.users.update', ['user' => $user->id]) }}" method="POST">
                        @csrf @method('PATCH')
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="tenant_id">Inquilino</label>
                                <span class="badge bg-primary"><a href="{{ route('admin.tenants.create') }}"><i
                                            class="fas fa-plus"></i> Adicionar</a></span>
                                <div>
                                    <select class="form-control" name="tenant_id" id="tenant_id">
                                        <option value=""><p>Selecione...</p></option>
                                        @foreach($tenants as $tenant)
                                        <option value="{{ $tenant->id }}" {{ $tenant->id == $user->tenant_id ? 'selected' : '' }}>{{ $tenant->id }} - {{ $tenant->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('tenant_id') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                            <hr>
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-number text-center text-muted mb-0">Qual função do usuário?</span>
                                        <div class="form-group">
                                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                <input type="checkbox" @if($rolemotorista) checked @endif class="custom-control-input" id="rolemotorista" name="rolemotorista">
                                                <label class="custom-control-label" for="rolemotorista">Motorista</label>
                                            </div>
                                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                <input type="checkbox" @if($rolesecretaria) checked @endif class="custom-control-input" id="rolesecretaria" name="rolesecretaria">
                                                <label class="custom-control-label" for="rolesecretaria">Secretária (o)</label>
                                            </div>
                                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                <input type="checkbox" @if($rolegerente) checked @endif class="custom-control-input" id="rolegerente" name="rolegerente">
                                                <label class="custom-control-label" for="rolegerente">Gerente</label>
                                            </div>
                                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                <input type="checkbox" @if($roleadmin) checked @endif class="custom-control-input" id="roleadmin" name="roleadmin">
                                                <label class="custom-control-label" for="roleadmin">Admin</label>
                                            </div>
                                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                <input type="checkbox" @if($rolesuperadmin) checked @endif class="custom-control-input" id="rolesuperadmin" name="rolesuperadmin">
                                                <label class="custom-control-label" for="rolesuperadmin">Super Admin</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            

                            <input type="hidden" name="id" id="id" value="{{$user->id}}">
                        </div>
                        {{-- <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" @if($user->hasRole('motorista')) checked @endif type="radio" name="rolemotorista">
                                            <label class="form-check-label">Motorista</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" @if($user->hasRole('secretaria')) checked @endif type="radio" name="rolesecretaria">
                                            <label class="form-check-label">Secretária(o)</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" @if($user->hasRole('gerente')) checked @endif type="radio" name="rolegerente">
                                            <label class="form-check-label">Gerente</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" @if($user->hasRole('admin')) checked @endif type="radio" name="roleadmin">
                                            <label class="form-check-label">Adm Sistema</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" @if($user->hasRole('superadmin')) checked @endif type="radio" name="rolesuperadmin">
                                            <label class="form-check-label">Super Admin</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <a href="{{ route('admin.users.index') }}" class="btn btn-warning"><i
                                class="fas fa-times-circle"></i> Cancelar</a>
                        <button type="submit" class="btn btn-success"><i class="fas fa-save nav-icon"></i>Atualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    Swal.fire(
        'Bem vindo!',
        'Este site exibe cookies!',
        'success'
)
</script>
@stop