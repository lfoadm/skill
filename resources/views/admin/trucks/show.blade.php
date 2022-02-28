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
                    <form action="{{ route('admin.trucks.destroy', ['truck' => $truck->id]) }}" method="POST">
                        @csrf @method('delete')
                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label style="font-weight: bolder" for="nome">Marca</label><br>
                                <span style="font-style:italic"><h2>{{ $truck->brand }}</h2></span>
                            </div>
                            <div class="form-group col-md-4">
                                <label style="font-weight: bolder" for="nome">Inquilino</label><br>
                                <span style="font-style:italic"><h4>{{ $truck->surname }}</h4></span>
                            </div>
                            <div class="form-group col-md-8">
                                <label style="font-weight: bolder" for="nome">Placa</label><br>
                                <span style="font-style:italic"><p>{{ $truck->plate }}</p></span>
                            </div>
                            <div class="form-group col-md-4">
                                <label style="font-weight: bolder" for="nome">Motorista Responsável</label><br>
                                <span style="font-style:italic"><h4>{{ $truck->user->name }}</h4></span>
                            </div>
                        </div>
                        <a href="{{ route('admin.trucks.index') }}" class="btn btn-warning"><i class="fas fa-times-circle"></i> Cancelar</a>
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Apagar</button>
                    </form>
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