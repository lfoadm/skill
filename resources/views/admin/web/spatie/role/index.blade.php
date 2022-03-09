@extends('adminlte::page')

@section('title', 'Grupo de usuários')

@section('content_header')
    <h1>Grupo de Acessos dos usuários</h1>
@stop

@section('content')

<div class="row">
    
    <div class="col-12">
        @include('admin.includes.alerts.alert')
        <a href="{{ route('admin.roles.create') }}" style="margin-bottom: 20px" class="btn btn-info btn-lg"><i class="fas fa-plus"></i></a>
            
        <div class="card">
        

            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nome do Grupo</th>
                            <th>Criado em</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <td>{{ $role->id }}</td>
                                <td>{{ $role->name }}</td>
                                <td>{{ $role->created_at }}</td>
                                <td>
                                    <a href="{{ route('admin.roles.edit', ['role' => $role->id]) }}"><i class="fas fa-pencil-alt" style="color: rgb(158, 157, 157); margin-right:10px"></i></a>
                                    <a href="{{ route('admin.roles.show', ['role' => $role->id]) }}"><i class="fas fa-trash" style="color:rgb(172, 34, 34); margin-right:10px"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

    </div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop