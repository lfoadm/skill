@extends('adminlte::page')

@section('title', 'Grupo de usuários')

@section('content_header')
    <h1>Empresas</h1>
@stop

@section('content')

<div class="row">
    <div class="col-12">
        @include('admin.includes.alerts.alert')
        @can('admin.companies.create')
            <a href="{{ route('admin.companies.create') }}" style="margin-bottom: 20px" class="btn btn-info btn-lg"><i class="fas fa-plus"></i></a>
        @endcan
        <div class="card">
            <div class="card-body table-responsive p-0">
                @if($companies->count() > 0)
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th class="text-center">Código</th>
                            <th class="text-center">Logo</th>
                            <th class="text-center">Nome</th>
                            <th class="text-center">Responsável</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($companies as $company)
                            <tr data-widget="expandable-table" aria-expanded="false" role="row" class="odd">
                                <td class="text-center" style="width: 1%">{{ $company->id }}</td>
                                <td style="align-items: center; width: 1%">
                                    @if($company->image)
                                        <img src="{{ url('storage/companies') }}/{{ $company->image }}" class="img-circle elevation-2 d-flex"  style="max-width: 50px">
                                    @else
                                        <img src="{{ url('storage/companies/default.png') }}" class="img-circle elevation-2 d-flex" style="max-width: 50px">
                                    @endif
                                </td>
                                <td style="width: 15%" class="text-center">{{ $company->corporateName }}</td>
                                <td style="width: 15%" class="text-center"> @if($company->user) {{ $company->user->name }} @else <span class="badge bg-warning">Sem Responsável</span> @endif</td>
                                <td class="text-center" style="width: 5%">
                                    @if( $company->status === 1)
                                        <span class="badge bg-success">Ativo</span>
                                    @else
                                        <span class="badge bg-danger">Inativo</span>
                                    @endif
                                </td>
                                <td  class="text-center" style="width: 8%">
                                    <a href="{{ route('admin.companies.edit', ['company' => $company->id]) }}"><i class="fas fa-pencil-alt" style="color: rgb(158, 157, 157); margin-right:10px"></i></a>
                                    <a href="{{ route('admin.companies.show', ['company' => $company->id]) }}"><i class="fas fa-search-plus" style="color: #575ec4; margin-right:10px"></i></a>
                                    @can('admin.companies.destroy')
                                        @if($company->status === 1)
                                            <a href="{{ route('admin.companies.disable', ['company' => $company->id]) }}"><i class="fas fa-user-slash" style="color:#e90a0a; margin-right:10px"></i></a>
                                        @else
                                            <a href="{{ route('admin.companies.enable', ['company' => $company->id]) }}"><i class="fas fa-user-check" style="color:#16be9a; margin-right:10px"></i></a>
                                        @endif
                                    @endcan
                                </td>
                            </tr>   
                        @endforeach
                    </tbody>
                </table>
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

@stop