@extends('adminlte::page')

@section('title', 'Grupo de usuários')

@section('content_header')
    <h1>Consulta de Usuário</h1>
@stop

@section('content')

<div class="row">
    <div class="col-md-3">
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    @if($user->image)
                        <img src="{{ url('storage/users') }}/{{ $user->image }}" class="profile-user-img img-fluid img-circle" style="width: 100%">
                    @else
                        <img src="{{ asset('/img/default.jpg') }}" class="profile-user-img img-fluid img-circle" style="width: 100%">
                    @endif
                </div>
                <h3 class="profile-username text-center">{{ $user->name }}</h3>
                <p class="text-muted text-center">
                    @if( $user->HasRole('motorista'))
                        <span class="badge btn btn-outline-secondary">Motorista</span>
                    @elseif( $user->HasRole('secretaria'))
                        <span class="badge btn btn-outline-info">Secretária(o)</span>
                    @elseif( $user->HasRole('gerente'))
                        <span class="badge btn btn-outline-dark">Gestor</span>
                    @elseif( $user->HasRole('admin'))
                        <span class="badge btn btn-outline-light">Adm Sistema</span>
                    @elseif( $user->HasRole('superadmin'))
                        <span class="badge btn btn-outline-success">SuperAdmin</span>
                    @else
                        <span class="badge btn btn-outline-danger">Não atribuído</span>
                    @endif
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="card">
            <div class="card-header p-2">
                <h2>Empresa contratante:
                        @if($user->tenant)
                            <strong style="color: darkblue">{{ $user->tenant->name }}</strong>
                        @else
                            <strong style="color: strongrown">Usuário sem vínculo de transportador</strong>
                        @endif
                </h2>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="active tab-pane" id="dados">
                        <div class="form-group row">
                            <label for="nome" class="col-sm-2 col-form-label" style="text-align: center">Nome</label>
                            <h5 class="col-sm-6 col-form-label" style="font-style:italic">{{ $user->name }}</h5>
                        </div>
                        <div class="form-group row">
                            <label for="nome" class="col-sm-2 col-form-label" style="text-align: center">E-mail</label>
                            <h5 class="col-sm-6 col-form-label" style="font-style:italic">{{ $user->email }}</h5>
                        </div>
                        <div class="form-group row">
                            <label for="nome" class="col-sm-2 col-form-label" style="text-align: center">Telefone</label>
                            <h5 class="col-sm-6 col-form-label" style="font-style:italic">{{ $user->phone }}</h5>
                        </div>
                        <div class="form-group row">
                            <label for="nome" class="col-sm-2 col-form-label" style="text-align: center">Situação</label>
                            <h5 class="col-sm-6 col-form-label">
                                @if( $user->status === 'actived')
                                <span class="badge bg-success">Ativo</span>
                            @elseif( $user->status === 'pre_registred')
                                <span class="badge bg-warning">Pré-registro</span>
                            @else
                                <span class="badge bg-danger">Inativo</span>
                            @endif
                        </h5>
                        </div>
                        <div class="form-group row">
                            <label for="nome" class="col-sm-2 col-form-label" style="text-align: center">Cargo</label>
                            <h5 class="col-sm-6 col-form-label">
                                @if( $user->HasRole('motorista'))
                                    <span class="badge bg-secondary">Motorista</span>
                                @elseif( $user->HasRole('secretaria'))
                                    <span class="badge bg-info">Secretária(o)</span>
                                @elseif( $user->HasRole('gerente'))
                                    <span class="badge bg-dark">Gestor</span>
                                @elseif( $user->HasRole('admin'))
                                    <span class="badge bg-light">Adm Sistema</span>
                                @elseif( $user->HasRole('superadmin'))
                                    <span class="badge bg-success">SuperAdmin</span>
                                @else
                                    <span class="badge bg-danger">Não atribuído</span>
                                @endif
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-12 text-center">
                <a href="{{ route('admin.users.index') }}" class="btn btn-block bg-gradient-success btn-lg"><i class="fas fa-arrow-left"></i> Voltar</a>
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