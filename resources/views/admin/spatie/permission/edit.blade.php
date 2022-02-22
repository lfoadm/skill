@extends('adminlte::page')

@section('title', 'Grupo de usuários')

@section('content_header')
    <h1>Permissão</h1>
@stop

@section('content')

<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">Editar permissão</h3>
    </div>
    <form action="{{ route('admin.permissions.update', ['permission' => $permission->id]) }}" method="post">
    @csrf @method('PUT')
        <div class="card-body">
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ $permission->name }}">
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-dark"><i class="fas fa-save nav-icon"></i> Atualizar</button>
        </div>
    </form>
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