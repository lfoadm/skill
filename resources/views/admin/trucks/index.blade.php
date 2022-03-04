@extends('adminlte::page')

@section('title', 'Grupo de usuários')

@section('content_header')
    <h1>Caminhões/Veículos</h1>
@stop

@section('content')
    <div class="content">
        @can('admin.trucks.create')
        <a href="{{ route('admin.trucks.create') }}" style="margin-bottom: 20px" class="btn btn-info btn-lg"><i
                class="fas fa-plus"></i></a>
        @endcan
        <div class="row">
            <div class="col-12">
                @include('includes.alerts.alert')
                <div class="card">
                    <div class="card-body table-responsive p-0">
                        @if($trucks->count() > 0)
                            <table class="table table-bordered table-hover" role="grid">
                                <thead>
                                    <tr role="row">
                                        <th>Código</th>
                                        <th>Avatar</th>
                                        <th>Empresa</th>
                                        <th>Motorista</th>
                                        <th>Placa</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($trucks as $truck)
                                    <tr data-widget="expandable-table" aria-expanded="false" role="row" class="odd">
                                        <td style="width: 1%">{{ $truck->id }}</td>
                                        <td style="width: 1%">
                                            @if($truck->image)
                                            <img src="{{ url('storage/trucks') }}/{{ $truck->image }}"
                                                class="img-circle elevation-2 d-flex" style="max-width: 50px">
                                            @else
                                            <img src="{{ url('storage/trucks/default.png') }}"
                                                class="img-circle elevation-2 d-flex" style="max-width: 50px">
                                            @endif
                                        </td>
                                        <td style="width: 15%">@if($truck->tenant) {{ $truck->tenant->name }} @else <p>Veículosem cadastro</p> @endif</td>
                                        <td style="width: 15%">@if($truck->user) {{ $truck->user->name }} @else <p>sem nome</p>
                                            @endif</td>
                                        <td style="width: 10%">{{ $truck->plate }}</td>
                                        <td class="text-center" style="width: 5%">
                                            @if( $truck->status === 1)
                                            <span class="badge bg-success">Ativo</span>
                                            @else
                                            <span class="badge bg-danger">Inativo</span>
                                            @endif
                                        </td>
                                        <td class="text-center" style="width: 8%">
                                            @can('admin.trucks.index')
                                            <a href="{{ route('admin.trucks.edit', ['truck' => $truck->id]) }}"><i
                                                class="fas fa-pencil-alt"
                                                style="color: rgb(158, 157, 157); margin-right:10px"></i></a>
                                            <a href="{{ route('admin.trucks.show', ['truck' => $truck->id]) }}"><i
                                                class="fas fa-search-plus" style="color:#575ec4; margin-right:10px"></i></a>
                                            @can('admin.trucks.destroy')
                                            @if($truck->status)
                                            <a href="{{ route('admin.trucks.disable', ['truck' => $truck->id]) }}"><i
                                                class="fas fa-user-slash"
                                                style="color:rgb(77, 6, 6); margin-right:10px"></i></a>
                                            @else
                                            <a href="{{ route('admin.trucks.enable', ['truck' => $truck->id]) }}"><i
                                                class="fas fa-user-check"
                                                style="color:rgb(18, 92, 76); margin-right:10px"></i></a>
                                            @endif
                                            {{-- <a href="{{ route('usuarios.permissoes.show', ['truck' => $truck->id]) }}"><i
                                                    class="fas fa-user-lock" style="color: black; margin-right:10px"></i></a>
                                            --}}
                                            @endcan
                                            @endcan
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        <div>
                            {{--$trucks->links()--}}
                        </div>
                        @else
                            <p class="text-center">Sem cadastro para listar.</p>
                        @endif
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