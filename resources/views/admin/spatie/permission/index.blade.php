@extends('adminlte::page')

@section('title', 'Grupo de usuários')

@section('content_header')
    <h1>Permissões</h1>
@stop

@section('content')

<div class="row">
    <div class="col-12">
        <a href="{{ route('admin.permissions.create') }}" style="margin-bottom: 20px" class="btn btn-info btn-lg"><i class="fas fa-plus"></i></a>
            
        <div class="card">
        
            @if($permissions->all())
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Permissão</th>
                                <th>Criado em</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($permissions as $permission)
                                <tr>
                                    <td>{{ $permission->id }}</td>
                                    <td>{{ $permission->name }}</td>
                                    <td>{{ $permission->created_at }}</td>
                                    <td>
                                        <a href="{{ route('admin.permissions.edit', ['permission' => $permission->id]) }}"><i class="fas fa-pencil-alt" style="color: rgb(158, 157, 157); margin-right:10px"></i></a>
                                        <a href="{{ route('admin.permissions.show', ['permission' => $permission->id]) }}"><i class="fas fa-trash" style="color:rgb(172, 34, 34); margin-right:10px"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
            <div class="card-body table-responsive p-0">
                <h5>Sem permissões cadastradas</h5>
            </div>
            @endif
        </div>
        {{ $permissions->links() }}
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