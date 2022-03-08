@extends('adminlte::page')

@section('title', 'Carregamento')

@section('content_header')
    <h1>Cadastro de carga</h1>
@stop

@section('content')

<div class="row">
    <div class="content">
        <div class="card">
            <div class="card-body">
                <div class="basic-form">
                    <form action="{{ route('master.loadings.store') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="loadingDate">Data Carga</label>
                                <input type="date" class="form-control" name="loadingDate" required>
                                @error('loadingDate') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="place">Local Carregamento</label>
                                <input type="text" class="form-control" name="place" required>
                                @error('place') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="product">Produto</label>
                                <div>
                                    <select class="form-control" name="product" id="product">
                                        <option value=""><p>-- Selecione --</p></option>
                                        <option value="Minério">Minério</option>
                                        <option value="calcário">Calcário</option>
                                        <option value="açúcar">Açúcar</option>
                                        <option value="Fosfato">Fosfato</option>
                                        <option value="Milho">Milho</option>
                                        <option value="Soja">Soja</option>
                                        <option value="Farelo de Soja">Farelo de Soja</option>
                                    </select>
                                </div>
                                @error('product') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label for="volume">Peso Líquido</label>
                                <input type="text" class="form-control" name="volume" id="volume" required>
                                @error('volume') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label for="unitPrice">Preço Unitário</label>
                                <input type="text" class="form-control" id="unitPrice" name="unitPrice" id="unitPrice" required>
                                @error('unitPrice') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label for="totalPrice">Preço Total</label>
                                <input type="text" class="form-control" id="totalPrice" name="totalPrice" id="totalPrice" required>
                                @error('totalPrice') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label for="amount">Valor Recebido</label>
                                <input type="text" class="form-control" id="amount" name="amount" required>
                                @error('amount') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                            
                            @if($user->hasRole('motorista'))
                                <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{ $user->id }}">
                                <input type="hidden" class="form-control" id="truck_id" name="truck_id" value="{{ $user->truck->id }}">
                                <input type="hidden" class="form-control" id="user_id_register" name="user_id_register" value="{{ $user->id }}">
                            @else
                                nao tem
                            @endif
                        </div>

                        <a href="{{ route('master.loadings.index') }}" class="btn btn-warning"><i class="fas fa-times-circle"></i> Cancelar</a>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Adicionar</button>
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
<script type="text/javascript" src="{{ asset('js/jquery.mask.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        //$("#volume").mask("00,000", {reverse: true})
        //$("#unitPrice").mask("000.000,00", {reverse: true})
        //$("#totalPrice").mask("000.000,00", {reverse: true})
        //$("#amount").mask("000.000,00", {reverse: true})
    })
</script>
@stop