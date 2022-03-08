@extends('adminlte::page')

@section('title', 'Carregamentos')

@section('content_header')
<h1>Registrar carregamento</h1>
@stop

@section('content')

<div class="content">
    @if ($user->truck)
        <a href="{{ route('master.loadings.create') }}" style="margin-bottom: 20px" class="btn btn-info btn-lg"><i class="fas fa-plus"></i></a>
    @else
        <p>-- motorista sem caminhão! --</p>
    @endif
    <div class="row">
        <div class="col-12">
            @include('includes.alerts.alert')
            <div class="card">
                <div class="card-body table-responsive p-0">
                    @if($loadings->count() > 0)
                    <table class="table table-bordered table-hover" role="grid">
                        <thead>
                            <tr role="row">
                                <th class="text-center">Código</th>
                                <th class="text-center">Produto</th>
                                <th class="text-center">Carregado em</th>
                                <th class="text-center">Valor Total</th>
                                <th class="text-center">Valor Recebido</th>
                                <th class="text-center">Status Descarga</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($loadings as $loading)
                            <tr data-widget="expandable-table" aria-expanded="false" role="row" class="odd">
                                <td class="text-center" style="width: 1%">{{ $loading->id }}</td>
                                <td class="text-center" style="width: 10%">{{ $loading->product }}</td>
                                <td class="text-center" style="width: 10%">{{ $loading->place }}</td>
                                <td class="text-center" style="width: 10%">{{ number_format($loading->totalPrice, 2, ',', '.') }}</td>
                                <td class="text-center" style="width: 10%">{{ number_format($loading->amount, 2, ',', '.') }}</td>
                                <td class="text-center" style="width: 10%">@if(!$loading->discharges) <p>Pendente</p> @else <P>DESCARREGADO</P>@endif</td>
                                <td style="width: 10%" class="text-center">
                                    <a href="{{-- route('admin.loadings.edit',['loading'=>$loading->id]) --}}"><i class="fas fa-pencil-alt" style="color: rgb(158, 157, 157); margin-right:10px"></i></a>
                                    <a href="{{-- route('admin.loadings.show',['loading'=>$loading->id]) --}}"><i class="fas fa-search-plus" style="color:#575ec4; margin-right:10px"></i></a>
                                    <a href="{{-- route('admin.loadings.disable',['loading'=>$loading->id]) --}}"><i class="fas fa-store-slash" style="color:rgb(172, 34, 34); margin-right:10px"></i></a>
                                    <a href="{{-- route('admin.loadings.activate',['loading'=>$loading->id]) --}}"><i class="fas fa-check-circle" style="color:rgb(18, 92, 76); margin-right:10px"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                        <p class="text-center">Sem carregamentos pendentes</p>
                    @endif
                    <div>
                        {{--$loadings->links()--}}
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