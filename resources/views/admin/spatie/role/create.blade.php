@extends('adminlte::page')

@section('title', 'Grupo de usuários')

@section('content_header')
    <h1>Grupo de Usuários</h1>
@stop

@section('content')

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Cadastrar</h3>
    </div>
    <form action="{{ route('admin.roles.store') }}" method="post">
    @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Digite o nome">
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </div>
    </form>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop