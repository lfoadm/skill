@extends('adminlte::page')

@section('title', 'Grupo de usuários')

@section('content_header')
    <h1>Liberar permissões</h1>
@stop

@section('content')

<section class="content">

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Detalhes do grupo <strong>{{ $role->name }}</strong></h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12 order-2 order-md-1">
                    <form action="{{ route('admin.roles_has_permissions', ['id' => $role->id]) }}" method="POST">
                        @csrf
                        <div class="row">

                            @include('admin.spatie.includes.permissions.usergroup')
                            @include('admin.spatie.includes.permissions.permissions')
                            @include('admin.spatie.includes.permissions.users')
                            @include('admin.spatie.includes.permissions.tenants')
                            @include('admin.spatie.includes.permissions.companies')
                            @include('admin.spatie.includes.permissions.trucks')
                            @include('admin.spatie.includes.permissions.drivers')
                            
                        </div>
                        <a href="{{ route('admin.roles.index') }}" class="btn btn-secondary">Cancelar</a>
                        <button class="btn btn-success" type="submit">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
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