@extends('adminlte::page')

@section('title', 'Grupo de usuários')

@section('content_header')
    <h1>Cadastro de empresas</h1>
@stop

@section('content')

<div class="row">
    <div class="content">
        <div class="card">
            <div class="card-body">
                <div class="basic-form">
                    <form action="{{ route('admin.companies.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label for="corporateName">Nome</label>
                                <input type="text" class="form-control" name="corporateName" required>
                                @error('corporateName') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group col-md-4">
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
                            <div class="form-group col-md-4">
                                <label for="fantasyName">Nome Fantasia</label>
                                <input type="text" class="form-control" name="fantasyName" required>
                                @error('fantasyName') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="cnpj">CNPJ</label>
                                <input type="text" class="form-control" id="cnpj" name="cnpj" required>
                                @error('cnpj') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="phone">Celular</label>
                                <input type="text" class="form-control" id="phone" name="phone">
                                @error('phone') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="email">E-mail</label>
                                <input type="email" class="form-control" name="email" required>
                                @error('email') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="site">Site</label>
                                <input type="text" class="form-control" name="site">
                                @error('site') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="instagram">Instagram</label>
                                <input type="text" class="form-control" name="instagram">
                                @error('instagram') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <input type="file" class="form-control-file" name="image" id="image">
                                @error('image') <p class="text-danger">{{ $message }}</p> @enderror
                                <div class="form-group" style="margin: 10px">
                                    <img src="" alt="" id="preview-image" width="120" />
                                </div>
                            </div>
                        </div>

                        <a href="{{ route('admin.companies.index') }}" class="btn btn-warning"><i class="fas fa-times-circle"></i> Cancelar</a>
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