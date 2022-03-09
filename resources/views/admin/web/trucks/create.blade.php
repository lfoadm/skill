@extends('adminlte::page')

@section('title', 'Grupo de usuários')

@section('content_header')
    <h1>Cadastro de Veículos</h1>
@stop

@section('content')

<div class="row">
    <div class="content">
        <div class="card">
            <div class="card-body">
                <div class="basic-form">
                    <form action="{{ route('admin.trucks.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label for="surname">Apelido</label>
                                <input type="text" id="surname" class="form-control" name="surname" {{-- required --}}>
                                @error('surname') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group col-md-2">
                                <label for="brand">Marca</label>
                                <input type="text" id="brand" class="form-control" name="brand" {{-- required --}}>
                                @error('brand') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group col-md-2">
                                <label for="model">Modelo</label>
                                <input type="text" id="model" class="form-control" name="model" {{-- required --}}>
                                @error('model') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group col-md-2">
                                <label for="color">Cor</label>
                                <input type="text" id="color" class="form-control" name="color" {{-- required --}}>
                                @error('color') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group col-md-2">
                                <label for="yearManufacture">Ano Fabricação</label>
                                <input type="text" id="yearManufacture" class="form-control" name="yearManufacture" {{-- required --}}>
                                @error('yearManufacture') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group col-md-2">
                                <label for="modelYear">Ano Modelo</label>
                                <input type="text" id="modelYear" class="form-control" name="modelYear" {{-- required --}}>
                                @error('modelYear') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="chassis">chassis</label>
                                <input type="text" id="chassis" class="form-control" name="chassis" {{-- required --}}>
                                @error('chassis') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label for="renavan">Renavan</label>
                                <input type="text" id="renavan" class="form-control" name="renavan" {{-- required --}}>
                                @error('renavan') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group col-md-2">
                                <label for="plate">Placa</label>
                                <input type="text" id="plate" class="form-control" name="plate" {{-- required --}}>
                                @error('plate') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label for="uf">UF</label>
                                <select name="uf" id="uf" class="form-control">
                                    <option value="">Selecione...</option>
                                    <option value="AC">AC - Acre</option>
                                    <option value="AL">AL - Alagoas</option>
                                    <option value="AP">AP - Amapá</option>
                                    <option value="AM">AM - Amazonas</option>
                                    <option value="BA">BA - Bahia</option>
                                    <option value="CE">CE - Ceará</option>
                                    <option value="DF">DF - Distrito Federal</option>
                                    <option value="ES">ES - Espírito Santo</option>
                                    <option value="GO">GO - Goiás</option>
                                    <option value="MA">MA - Maranhão</option>
                                    <option value="MT">MT - Mato Grosso</option>
                                    <option value="MS">MS - Mato Grosso do Sul</option>
                                    <option value="MG">MG - Minas Gerais</option>
                                    <option value="PA">PA - Pará</option>
                                    <option value="PB">PB - Paraíba</option>
                                    <option value="PR">PR - Paraná</option>
                                    <option value="PE">PE - Pernambuco</option>
                                    <option value="PI">PI - Piauí</option>
                                    <option value="RJ">RJ - Rio de Janeiro</option>
                                    <option value="RN">RN - Rio Grande do Norte</option>
                                    <option value="RS">RS - Rio Grande do Sul</option>
                                    <option value="RO">RO - Rondônia</option>
                                    <option value="RR">RR - Roraima</option>
                                    <option value="SC">SC - Santa Catarina</option>
                                    <option value="SP">SP - São Paulo</option>
                                    <option value="SE">SE - Sergipe</option>
                                    <option value="TO">TO - Tocantins</option>
                                </select>
                                @error('uf') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                            {{-- <div class="form-group col-md-4">
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
                            </div> --}}
                            
                            <div class="form-group col-md-4">
                                <label for="user_id">Motorista</label>
                                {{-- <span class="badge bg-primary"><a href="{{ route('admin.companies.create') }}"><i class="fas fa-plus"></i> Adicionar</a></span> --}}
                                <div>
                                    <select class="form-control" name="user_id" id="user_id">
                                        <option value=""><p>Selecione...</p></option>
                                        @foreach($drivers as $driver)
                                            <option value="{{ $driver->id }}">{{ $driver->id }} - {{ $driver->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('user_id') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <input type="file" class="form-control-file" name="image" id="image">
                                @error('image') <p class="text-danger">{{ $message }}</p> @enderror
                                <div class="form-group" style="margin: 10px">
                                    <img src="" alt="" id="preview-image" width="120" />
                                </div>
                            </div>
                        </div>

                        <a href="{{ route('admin.trucks.index') }}" class="btn btn-warning"><i class="fas fa-times-circle"></i> Cancelar</a>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-plus nav-icon"></i> Adicionar</button>
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
        var options = {
                translation: {
                    'A': {pattern: /[A-Z]/},
                    'a': {pattern: /[a-zA-Z]/},
                    'S': {pattern: /[a-zA-Z0-9]/},
                    'L': {pattern: /[a-z]/}, // | 0 números obrigatórios | 9 números opcionais
                }
            }
            $("#plate").mask("AAA-0S00", options)
            $("#yearManufacture").mask("0000", options)
            $("#modelYear").mask("0000", options)
            $("#renavan").mask("000.000.000.000", {reverse:true})
            $("#chassis").mask("SSSSSSSSSSSSSSSSS", options)

    })
</script>
<script>
    const input = document.querySelector("#image");
    //change = quando o usuario insere a imagem
    input.addEventListener("change", function(e) {

        const tgt = e.target || window.event.srcElement;

        const files = tgt.files;

        const fr = new FileReader();

        fr.onload = function() {
            document.querySelector("#preview-image").src = fr.result;
        }

        fr.readAsDataURL(files[0]);
    });
</script>
@stop