@extends('adminlte::page')

@section('title', 'Grupo de usuários')

@section('content_header')
<h1>Tenants</h1>
@stop

@section('content')

<div class="content">

    <a href="{{ route('admin.tenants.create') }}" style="margin-bottom: 20px" class="btn btn-info btn-lg"><i
            class="fas fa-plus"></i></a>
    <div class="row">
        <div class="col-12">
            @include('includes.alerts.alert')
            <div class="card">
                <div class="card-body table-responsive p-0">
                    @if($tenants->count() > 0)
                    <table class="table table-bordered table-hover" role="grid">
                        <thead>
                            <tr role="row">
                                <th class="text-center">Código</th>
                                <th class="text-center">Nome</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tenants as $tenant)
                            <tr data-widget="expandable-table" aria-expanded="false" role="row" class="odd">
                                <td class="text-center" style="width: 1%">{{ $tenant->id }}</td>
                                <td style="width: 25%">{{ $tenant->name }}</td>
                                <td class="text-center" style="width: 10%">
                                    @if( $tenant->status === 1)
                                    <span class="badge bg-success">Ativo</span>
                                    @else
                                    <span class="badge bg-danger">Inativo</span>
                                    @endif
                                </td>
                                <td style="width: 10%" class="text-center">
                                    <a href="{{ route('admin.tenants.edit', ['tenant' => $tenant->id]) }}"><i
                                            class="fas fa-pencil-alt"
                                            style="color: rgb(158, 157, 157); margin-right:10px"></i></a>
                                    <a href="{{ route('admin.tenants.show', ['tenant' => $tenant->id]) }}"><i
                                            class="fas fa-search-plus" style="color:#575ec4; margin-right:10px"></i></a>

                                    @if($tenant->status === 1)
                                    <a href="{{ route('admin.tenants.disable', ['tenant' => $tenant->id]) }}"><i
                                            class="fas fa-store-slash"
                                            style="color:rgb(172, 34, 34); margin-right:10px"></i></a>
                                    @else
                                    <a href="{{ route('admin.tenants.activate', ['tenant' => $tenant->id]) }}"><i
                                            class="fas fa-check-circle"
                                            style="color:rgb(18, 92, 76); margin-right:10px"></i></a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <p class="text-center">Sem cadastro para listar.</p>
                    @endif
                    <div>
                        {{--$tenants->links()--}}
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

@stop