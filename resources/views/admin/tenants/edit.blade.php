@extends('adminlte::page')

@section('title', 'Grupo de usuários')

@section('content_header')
    <h1>Tenants</h1>
@stop

@section('content')

<div class="content">
    <div class="card">
        <div class="card-body">
            <div class="basic-form">
                <form action="{{ route('admin.tenants.update', ['tenant' => $tenant->id]) }}" method="POST">
                    @csrf @method('PUT')
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="name">Nome</label>
                            <input type="text" class="form-control" name="name" required value="{{$tenant->name}}">
                            @error('name') <p class="text-danger">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="description">Descrição</label>
                            <textarea class="form-control" name="description" id="description" cols="30" rows="5">{{$tenant->description}}</textarea>
                                
                            
                            @error('description') <p class="text-danger">{{ $message }}</p> @enderror
                        </div>
                    </div>
                    <a href="{{ route('admin.tenants.index') }}" class="btn btn-warning"><i class="fas fa-times-circle"></i> Cancelar</a>
                    <button type="submit" class="btn btn-dark"><i class="fas fa-wrench"></i> Atualizar</button>
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