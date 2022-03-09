@extends('adminlte::page')

@section('title', 'Grupo de usuários')

@section('content_header')
    <h1>Motoristas</h1>
@stop

@section('content')

<div class="content">
    <div class="row">
        <div class="col-12">
            @include('admin.includes.alerts.alert')
            <div class="card">
                <div class="card-body table-responsive p-0">
                    @if($drivers->count() > 0)
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th class="text-center">Código</th>
                                <th class="text-center">Avatar</th>
                                <th class="text-center">Nome</th>
                                <th class="text-center">Empresa</th>
                                <th class="text-center">Cargo</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Documentos</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($drivers as $driver)
                            <tr data-widget="expandable-table" aria-expanded="false" role="row" class="odd">
                                <td class="text-center" style="width: 1%">{{ $driver->id }}</td>
                                <td style="align-items: center; width: 1%">
                                    @if($driver->user->profile_photo_path)
                                    <img src="{{ url('storage/') }}/{{ $driver->user->profile_photo_path }}"
                                        class="img-circle elevation-2 d-flex" style="max-width: 50px">
                                    @else
                                    <img src="{{ url('storage/profile-photos/user.png') }}"
                                        class="img-circle elevation-2 d-flex" style="max-width: 50px">
                                    @endif
                                </td>
                                <td style="width: 15%" class="text-center">{{ $driver->user->name }}</td>
                                <td class="text-center" style="width: 20%">
                                    @if($driver->tenant)
                                    {{ $driver->tenant->name }}
                                    @else
                                    <div style="color: red">
                                        <p>Sem Transportador atribuído</p>
                                    </div>
                                    @endif
                                </td>
                                <td class="text-center" style="width: 5%">
                                    @if( $driver->user->HasRole('motorista'))
                                    <span class="badge bg-secondary">Motorista</span>
                                    @elseif( $driver->user->HasRole('secretaria'))
                                    <span class="badge bg-info">Secretária(o)</span>
                                    @elseif( $driver->user->HasRole('gerente'))
                                    <span class="badge bg-dark">Gestor</span>
                                    @elseif( $driver->user->HasRole('admin'))
                                    <span class="badge bg-light">Adm Sistema</span>
                                    @elseif( $driver->user->HasRole('superadmin'))
                                    <span class="badge bg-success">SuperAdmin</span>
                                    @else
                                    <span class="badge bg-danger">Não atribuído</span>
                                    @endif
                                </td>
                                <td class="text-center" style="width: 5%">
                                    @if( $driver->user->status === 'actived')
                                    <span class="badge bg-success">Ativo</span>
                                    @elseif( $driver->user->userstatus === 'pre_registred')
                                    <span class="badge bg-warning">Pré-registro</span>
                                    @else
                                    <span class="badge bg-danger">Inativo</span>
                                    @endif
                                </td>
                                <td class="text-center" style="width: 5%">
                                    @if( $driver->cnh)
                                    <span class="badge bg-primary">ok</span>
                                    @else
                                    <span class="badge bg-danger">Pendente</span>
                                    @endif
                                </td>
                                <td class="text-center" style="width: 8%">
                                    @if($driver->user->tenant_id)
                                    @if($driver->tenant_id === null)
                                    <a href="{{ route('admin.drivers.setTenant', ['driver' => $driver->id]) }}"><i
                                            class="fas fa-shipping-fast"
                                            style="color:#16be9a; margin-right:10px"></i></a>
                                    @endif
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <p class="text-center">Sem cadastro para listar.</p>
                @endif
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