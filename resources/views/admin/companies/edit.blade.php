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
                    <form action="{{ route('admin.companies.update', ['company' => $company->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf @method('PUT')
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="corporateName">Nome</label>
                                <input type="text" class="form-control" name="corporateName" required value="{{$company->corporateName}}">
                                @error('corporateName') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                            @if($user->hasRole('superadmin'))
                                <div class="form-group col-md-3">
                                    <label for="tenant_id">Inquilino</label>
                                    <span class="badge bg-primary"><a href="{{ route('admin.tenants.create') }}"><i class="fas fa-plus"></i> Adicionar</a></span>
                                        <div>
                                            <select class="form-control" name="tenant_id" id="tenant_id">
                                                <option value=""><p>Selecione...</p></option>
                                                @foreach($tenants as $tenant)
                                                    <option value="{{ $tenant->id }}" {{ $tenant->id == $company->tenant_id ? 'selected' : '' }} >{{ strtoupper($tenant->id) }} - {{ strtoupper($tenant->name) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('tenant_id') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="user_id">Diretor Responsável</label>
                                    <div>
                                        <select class="form-control" name="user_id" id="user_id">
                                            <option value=""><p>Selecione...</p></option>
                                            @foreach($users as $user)
                                                <option value="{{ $user->id }}" {{ $user->id == $company->user_id ? 'selected' : '' }} >@if($user->hasRole('gerente')) {{ $user->id }} - {{ $user->name }} @endif</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('user_id') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            @elseif($user->hasRole('secretaria'))
                                <input type="hidden" name="tenant_id" id="tenant_id" value="{{ $user->tenant->id }}">
                            @endif
                            <div class="form-group col-md-4">
                                <label for="fantasyName">Nome Fantasia</label>
                                <input type="text" class="form-control" name="fantasyName" required value="{{$company->fantasyName}}">
                                @error('fantasyName') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="cnpj">CNPJ/CPF</label>
                                <input type="text" class="form-control" id="cnpj" name="cnpj" required value="{{$company->cnpj}}">
                                
                                @error('cnpj') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="phone">Celular</label>
                                <input type="text" class="form-control" name="phone" id="phone" value="{{$company->phone}}">
                                @error('phone') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="email">E-mail</label>
                                <input type="email" class="form-control" name="email" required value="{{$company->email}}">
                                @error('email') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="site">Site</label>
                                <input type="text" class="form-control" name="site" value="{{$company->site}}">
                                @error('site') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="instagram">Instagram</label>
                                <input type="text" class="form-control" name="instagram" value="{{$company->instagram}}">
                                @error('instagram') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <input type="file" class="form-control-file" name="image" id="image">
                                @error('image') <p class="text-danger">{{ $message }}</p> @enderror
                                <div class="form-group" style="margin: 10px">
                                    @if($company->image)
                                        <img src="{{ url('storage/companies') }}/{{ $company->image }}" alt="" id="preview-image" width="120" />
                                    @else
                                        <img src="" alt="" id="preview-image" width="120" />
                                    @endif
                                </div>
                            </div>
                            <input type="hidden" name="id" id="id" value="{{$company->id}}">
                            
                        </div>
                        <a href="{{ route('admin.companies.index') }}" class="btn btn-warning"><i class="fas fa-times-circle"></i> Cancelar</a>
                        <button type="submit" class="btn btn-dark"><i class="fas fa-wrench"></i> Atualizar</button>
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