@extends('adminlte::page')

@section('title', 'Grupo de usuários')

@section('content_header')
    <h1>Empresas</h1>
@stop

@section('content')

<div class="content">
    <div class="card">
        <div class="card-body">
            <div class="basic-form">
                <form action="{{ route('admin.companies.destroy', ['company' => $company->id]) }}" method="POST">
                    @csrf @method('delete')
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label style="font-weight: bolder" for="corporateName">Nome</label><br>
                            <span style="font-style:italic"><h2>{{ $company->corporateName }}</h2></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label style="font-weight: bolder" for="nome">Inquilino</label><br>
                            <span style="font-style:italic"><h4>{{ $company->tenant->name }}</h4></span>
                        </div>
                        <div class="form-group col-md-12">
                            <label style="font-weight: bolder" for="nome">E-mail</label><br>
                            <span style="font-style:italic"><p>{{ $company->email }}</p></span>
                        </div>
                        <input type="hidden" name="id" value="{{ $company->id }}">
                    </div>
                    <a href="{{ route('admin.companies.index') }}" class="btn btn-warning"><i class="fas fa-times-circle"></i> Cancelar</a>
                    {{-- @can('admin.companies.destroy')
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Apagar</button>
                    @endcan --}}
                </form>
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