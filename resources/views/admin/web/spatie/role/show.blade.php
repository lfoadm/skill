@extends('adminlte::page')

@section('title', 'Grupo de usuários')

@section('content_header')
    <h1>Grupo de Usuários</h1>
@stop

@section('content')

<section class="content">

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Detalhes do grupo de usuário: <strong>{{ $role->name }}</strong></h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <form action="{{ route('admin.roles.destroy', ['role' => $role->id]) }}" method="post">
                    @csrf @method('DELETE')
                    <div class="col-12 col-md-12 col-lg-12 order-2 order-md-1">
                        <div class="row">
                            <div class="col-12 col-sm-12">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">{{ $role->name }}</span>
                                        <span class="info-box-number text-center text-muted mb-0">{{ $role->created_at }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-12 order-2 order-md-1">
                        <div class="row">
                            <div class="col-12 col-sm-12 text-center">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">
                                            <a href="{{ route('admin.roles.index') }}" class="btn btn-warning"><i class="fas fa-times-circle"></i> Cancelar</a>
                                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Apagar</button>
                                        </span>
                                    </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

</section>

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