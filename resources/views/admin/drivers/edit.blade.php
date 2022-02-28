@extends('adminlte::page')

@section('title', 'Grupo de usuários')

@section('content_header')
    <h1>Ajuste dados motorista</h1>
@stop

@section('content')

<div class="row">
    <div class="content">
        <div class="card">
            <div class="card-body">
                <div class="basic-form">
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label style="font-weight: bolder" for="name">Nome</label><br>
                            <span style="font-style:italic"><h2>{{ $driver->user->name }}</h2></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label style="font-weight: bolder" for="email">E-mail</label><br>
                            <span style="font-style:italic"><h4>{{ $driver->user->email }}</h4></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label style="font-weight: bolder" for="name">Situação</label><br>
                            <span style="font-style:italic">
                                @if($driver->user->status === 'actived')
                                    <h2>Ativo</h2>
                                @elseif($driver->user->status === 'inactived')
                                    <h2>Inativo</h2>
                                @else
                                    <h2>Pré-registrado</h2>
                                @endif
                            </span>
                        </div>
                    </div>
                    <form action="{{ route('admin.drivers.update', ['driver' => $driver->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="tenant_id">Inquilino</label>
                                <span class="badge bg-primary"><a href="{{ route('admin.tenants.create') }}"><i class="fas fa-plus"></i> Adicionar</a></span>
                                <div>
                                    <select class="form-control" name="tenant_id" id="tenant_id">
                                        <option value=""><p>Selecione...</p></option>
                                        @foreach($tenants as $tenant)
                                            <option value="{{ $tenant->id }}">{{ $tenant->id }} - {{ $tenant->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('tenant_id') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>

                            {{-- <div class="form-group col-md-6">
                                <label for="truck_id">Caminhão</label>
                                <span class="badge bg-primary"><a href="{{ route('admin.trucks.create') }}"><i class="fas fa-plus"></i> Adicionar</a></span>
                                <div>
                                    <select class="form-control" name="truck_id" id="truck_id">
                                        <option value=""><p>Selecione...</p></option>
                                        @foreach($trucks as $truck)
                                            <option value="{{ $truck->id }}">{{ $truck->id }} - {{ $truck->plate }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('truck_id') <p class="text-danger">{{ $message }}</p> @enderror
                            </div> --}}
                            <input type="hidden" name="id" id="id" value="{{$driver->id}}">
                        </div>

                        <a href="{{ route('admin.drivers.index') }}" class="btn btn-warning"><i class="fas fa-times-circle"></i> Cancelar</a>
                        <button type="submit" class="btn btn-success"><i class="fas fa-save nav-icon"></i> Atualizar</button>
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
    
@stop