@extends('adminlte::page')

@section('title', 'Grupo de usuários')

@section('content_header')
    <h1>Caminhões/Veículos</h1>
@stop

@section('content')

<div class="row">
    <div class="col-12">
        @if(session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @elseif(session('msg'))
            <div class="alert alert-danger" role="alert">
                {{ session('msg') }}
            </div>
        @endif
        <a href="{{ route('admin.trucks.create') }}" style="margin-bottom: 20px" class="btn btn-info btn-lg"><i class="fas fa-plus"></i></a>
        <div class="content">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"></h4>
                    <div class="table-responsive">
                        <div id="DataTables_Table_0_wrapper" class="dataTables-wrapper container-fluid dt_bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
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
                                                    <td style="width: 1%" >
                                                        @if($truck->image)
                                                            <img src="{{ url('storage/trucks') }}/{{ $truck->image }}" class="img-circle elevation-2 d-flex" style="max-width: 50px">
                                                        @else
                                                            <img src="{{ url('storage/trucks/Default.jpg') }}" class="img-circle elevation-2 d-flex" style="max-width: 50px">
                                                        @endif
                                                    </td>
                                                    <td style="width: 15%">{{ $truck->user->tenant->name }}</td>
                                                    <td style="width: 15%">{{ $truck->user->name }}</td>
                                                    <td style="width: 10%">{{ $truck->plate }}</td>
                                                    <td class="text-center" style="width: 5%">
                                                        @if( $truck->status === 1)
                                                            <span class="badge bg-success">Ativo</span>
                                                        @else
                                                            <span class="badge bg-danger">Inativo</span>
                                                        @endif
                                                    </td>
                                                    <td class="text-center" style="width: 8%">
                                                        <a href="{{ route('admin.trucks.edit', ['truck' => $truck->id]) }}"><i class="fas fa-pencil-alt" style="color: rgb(158, 157, 157); margin-right:10px"></i></a>
                                                        <a href="{{ route('admin.trucks.show', ['truck' => $truck->id]) }}"><i class="fas fa-search-plus" style="color:#575ec4; margin-right:10px"></i></a>
                                                        @if($truck->status)
                                                            <a href="{{ route('admin.trucks.disable', ['truck' => $truck->id]) }}"><i class="fas fa-user-slash" style="color:rgb(77, 6, 6); margin-right:10px"></i></a>
                                                        @else
                                                            
                                                                <a href="{{ route('admin.trucks.enable', ['truck' => $truck->id]) }}"><i class="fas fa-user-check" style="color:rgb(18, 92, 76); margin-right:10px"></i></a>
                                                            
                                                        @endif
                                                        {{-- <a href="{{ route('usuarios.permissoes.show', ['truck' => $truck->id]) }}"><i class="fas fa-user-lock" style="color: black; margin-right:10px"></i></a> --}}
                                                    </td>
                                                </tr>   
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div>
                                        {{--$trucks->links()--}}
                                    </div>
                                </div>
                            </div>
                        </div>
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