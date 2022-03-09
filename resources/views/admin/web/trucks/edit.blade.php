@extends('adminlte::page')

@section('title', 'Grupo de usuários')

@section('content_header')
    <h1>Atualizar dados de veículo</h1>
@stop

@section('content')

<div class="row">
    <div class="content">
        <div class="card">
            <div class="card-body">
                <div class="basic-form">
                    <form action="{{ route('admin.trucks.update', ['truck' => $truck->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf @method('PUT')
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label for="surname">Apelido</label>
                                <input type="text" id="surname" class="form-control" name="surname" required value="{{ $truck->surname }}">
                                @error('surname') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group col-md-2">
                                <label for="brand">Marca</label>
                                <input type="text" id="brand" class="form-control" name="brand" required value="{{ $truck->brand }}">
                                @error('brand') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group col-md-2">
                                <label for="model">Modelo</label>
                                <input type="text" id="model" class="form-control" name="model" required value="{{ $truck->model }}">
                                @error('model') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group col-md-2">
                                <label for="color">Cor</label>
                                <input type="text" id="color" class="form-control" name="color" required value="{{ $truck->color }}">
                                @error('color') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group col-md-2">
                                <label for="yearManufacture">Ano Fabricação</label>
                                <input type="text" id="yearManufacture" class="form-control" name="yearManufacture" required value="{{ $truck->yearManufacture }}">
                                @error('yearManufacture') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group col-md-2">
                                <label for="modelYear">Ano Modelo</label>
                                <input type="text" id="modelYear" class="form-control" name="modelYear" required value="{{ $truck->modelYear }}">
                                @error('modelYear') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="chassis">chassis</label>
                                <input type="text" id="chassis" class="form-control" name="chassis" required value="{{ $truck->chassis }}">
                                @error('chassis') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label for="renavan">Renavan</label>
                                <input type="text" id="renavan" class="form-control" name="renavan" required value="{{ $truck->renavan }}">
                                @error('renavan') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group col-md-2">
                                <label for="plate">Placa</label>
                                <input type="text" id="plate" class="form-control" name="plate" required value="{{ $truck->plate }}">
                                @error('plate') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label for="uf">UF</label>
                                <select name="uf" id="uf" class="form-control">
                                    <option value="">Selecione...</option>
                                    <option value="AC" @if($truck->UF === 'AC') selected='selected' @endif>AC - Acre</option>
                                    <option value="AL" @if($truck->UF === 'AL') selected='selected' @endif>AL - Alagoas</option>
                                    <option value="AP" @if($truck->UF === 'AP') selected='selected' @endif>AP - Amapá</option>
                                    <option value="AM" @if($truck->UF === 'AM') selected='selected' @endif>AM - Amazonas</option>
                                    <option value="BA" @if($truck->UF === 'BA') selected='selected' @endif>BA - Bahia</option>
                                    <option value="CE" @if($truck->UF === 'CE') selected='selected' @endif>CE - Ceará</option>
                                    <option value="DF" @if($truck->UF === 'DF') selected='selected' @endif>DF - Distrito Federal</option>
                                    <option value="ES" @if($truck->UF === 'ES') selected='selected' @endif>ES - Espírito Santo</option>
                                    <option value="GO" @if($truck->UF === 'GO') selected='selected' @endif>GO - Goiás</option>
                                    <option value="MA" @if($truck->UF === 'MA') selected='selected' @endif>MA - Maranhão</option>
                                    <option value="MT" @if($truck->UF === 'MT') selected='selected' @endif>MT - Mato Grosso</option>
                                    <option value="MS" @if($truck->UF === 'MS') selected='selected' @endif>MS - Mato Grosso do Sul</option>
                                    <option value="MG" @if($truck->UF === 'MG') selected='selected' @endif>MG - Minas Gerais</option>
                                    <option value="PA" @if($truck->UF === 'PA') selected='selected' @endif>PA - Pará</option>
                                    <option value="PB" @if($truck->UF === 'PB') selected='selected' @endif>PB - Paraíba</option>
                                    <option value="PR" @if($truck->UF === 'PR') selected='selected' @endif>PR - Paraná</option>
                                    <option value="PE" @if($truck->UF === 'PE') selected='selected' @endif>PE - Pernambuco</option>
                                    <option value="PI" @if($truck->UF === 'PI') selected='selected' @endif>PI - Piauí</option>
                                    <option value="RJ" @if($truck->UF === 'RJ') selected='selected' @endif>RJ - Rio de Janeiro</option>
                                    <option value="RN" @if($truck->UF === 'RN') selected='selected' @endif>RN - Rio Grande do Norte</option>
                                    <option value="RS" @if($truck->UF === 'RS') selected='selected' @endif>RS - Rio Grande do Sul</option>
                                    <option value="RO" @if($truck->UF === 'RO') selected='selected' @endif>RO - Rondônia</option>
                                    <option value="RR" @if($truck->UF === 'RR') selected='selected' @endif>RR - Roraima</option>
                                    <option value="SC" @if($truck->UF === 'SC') selected='selected' @endif>SC - Santa Catarina</option>
                                    <option value="SP" @if($truck->UF === 'SP') selected='selected' @endif>SP - São Paulo</option>
                                    <option value="SE" @if($truck->UF === 'SE') selected='selected' @endif>SE - Sergipe</option>
                                    <option value="TO" @if($truck->UF === 'TO') selected='selected' @endif>TO - Tocantins</option>
                                </select>
                                @error('uf') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="user_id">Motorista</label>
                                <div>
                                    <select class="form-control" name="user_id" id="user_id">
                                        <option value=""><p>Selecione...</p></option>
                                        @foreach($drivers as $driver)
                                            <option value="{{ $driver->id }}"  {{ $driver->id == $truck->user_id ? 'selected' : '' }}>{{ strtoupper($driver->id) }} - {{ strtoupper($driver->name) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('user_id') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <input type="file" class="form-control-file" name="image" id="image">
                                @error('image') <p class="text-danger">{{ $message }}</p> @enderror
                                <div class="form-group" style="margin: 10px">
                                    @if($truck->image)
                                        <img src="{{ url('storage/trucks') }}/{{ $truck->image }}" alt="" id="preview-image" width="120" />
                                    @else
                                        <img src="" alt="" id="preview-image" width="120" />
                                    @endif
                                </div>
                            </div>
                            {{-- <input type="hidden" name="id" id="id" value="{{$truck->id}}"> --}}
                        </div>

                        <a href="{{ route('admin.trucks.index') }}" class="btn btn-warning"><i class="fas fa-times-circle"></i> Cancelar</a>
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
<script type="text/javascript" src="{{ asset('js/jquery.mask.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#cnpj").mask("00.000.000/0000-00")
        $("#phone").mask("(00) 0000-00000")
        $("#phone").blur(function(event) {
            if($(this).val().length == 15) {
                $("#phone").mask("(00) 00000-0000")
            }
            else {
                $("#phone").mask("(00) 0000-00000")
            }
        })
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