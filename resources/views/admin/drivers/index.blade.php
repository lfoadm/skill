@extends('adminlte::page')

@section('title', 'Grupo de usuários')

@section('content_header')
    <h1>Motoristas</h1>
@stop

@section('content')

<div class="row">
    
    <div class="col-12">
        <a href="{{-- route('admin.roles.create') --}}" style="margin-bottom: 20px" class="btn btn-info btn-lg"><i class="fas fa-plus"></i></a>
        <div class="card">
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th class="text-center">Código</th>
                            <th class="text-center">Avatar</th>
                            <th class="text-center">Nome</th>
                            <th class="text-center">Empresa</th>
                            <th class="text-center">Cargo</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr data-widget="expandable-table" aria-expanded="false" role="row" class="odd">
                                <td class="text-center" style="width: 1%">{{ $user->id }}</td>
                                <td style="align-items: center; width: 1%">
                                    @if($user->profile_photo_path)
                                        <img src="{{ url('storage/') }}/{{ $user->profile_photo_path }}" class="img-circle elevation-2 d-flex"  style="max-width: 50px">
                                    @else
                                        <img src="{{ url('storage/profile-photos/user.png') }}" class="img-circle elevation-2 d-flex" style="max-width: 50px">
                                    @endif
                                </td>
                                <td style="width: 15%" class="text-center">{{ $user->name }}</td>
                                <td class="text-center" style="width: 20%">
                                    @if($user->tenant)
                                        {{ $user->tenant->name }}
                                    @else
                                        <div style="color: red">
                                            <p>Sem Transportador atribuído</p>
                                        </div>
                                    @endif
                                </td>
                                <td class="text-center" style="width: 5%">
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
                                </td>
                                <td class="text-center" style="width: 5%">
                                    @if( $user->status === 'actived')
                                        <span class="badge bg-success">Ativo</span>
                                    @elseif( $user->status === 'pre_registred')
                                        <span class="badge bg-warning">Pré-registro</span>
                                    @else
                                        <span class="badge bg-danger">Inativo</span>
                                    @endif
                                </td>
                                <td  class="text-center" style="width: 8%">
                                    <a href="{{ route('admin.users.edit', ['user' => $user->id]) }}"><i class="fas fa-pencil-alt" style="color: rgb(158, 157, 157); margin-right:10px"></i></a>
                                    <a href="{{ route('admin.users.show', ['user' => $user->id]) }}"><i class="fas fa-search-plus" style="color: #575ec4; margin-right:10px"></i></a>
                                        @if($user->status === 'actived')
                                            <a href="{{ route('admin.users.disable', ['user' => $user->id]) }}"><i class="fas fa-user-slash" style="color:#e90a0a; margin-right:10px"></i></a>
                                        @elseif($user->status === 'inactived')
                                            <a href="{{ route('admin.users.enable', ['user' => $user->id]) }}"><i class="fas fa-user-check" style="color:#16be9a; margin-right:10px"></i></a>
                                        @else
                                            <a href="{{ route('admin.users.enable', ['user' => $user->id]) }}"><i class="fas fa-user-check" style="color:#16be9a; margin-right:10px"></i></a>
                                        @endif
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
    <script>
        Swal.fire(
        'Bem vindo!',
        'Este site exibe cookies!',
        'success'
)
    </script>
@stop