@extends('adminlte::page')

@section('title', 'Grupo de usuários')

@section('content_header')
    <h1>Visualizar Tenant</h1>
@stop

@section('content')

<div class="content">
    <div class="card">
        <div class="card-body">
            <div class="basic-form">
                <form action="{{ route('admin.tenants.destroy', ['tenant' => $tenant->id]) }}" method="POST">
                    @csrf @method('DELETE')
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label style="font-weight: bolder" for="nome">Nome</label><br>
                            <span style="font-style:italic"><h2>{{ $tenant->name }}</h2></span>
                        </div>
                        <div class="form-group col-md-8">
                            <label style="font-weight: bolder" for="nome">Descrição</label><br>
                            <p style="font-style:italic">{{ $tenant->description }}</p>
                        </div>
                        
                    </div>
                    <a href="{{ route('admin.tenants.index') }}" class="btn btn-warning"><i class="fas fa-times-circle"></i> Cancelar</a>
                    {{-- <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Apagar</button> --}}
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
    
@stop