@extends('adminlte::page')

@section('title', 'Grupo de usuários')

@section('content_header')
    <h1>Perfil</h1>
@stop

@section('content')

<section class="content">
    @include('admin.includes.alerts.alert')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            @if($user->profile_photo_path)
                                <img class="profile-user-img img-fluid img-circle" src="{{ url('storage/') }}/{{ $user->profile_photo_path }}"
                                    alt="User profile picture">
                            @else
                            <img class="profile-user-img img-fluid img-circle" src="{{ url('storage/profile-photos/user.png') }}"
                                alt="User profile picture">
                            @endif    
                        </div>
                        <h3 class="profile-username text-center">{{ $user->name }}</h3>
                        @if( $user->HasRole('motorista'))
                            <p class="text-muted text-center">Motorista</p>
                        @elseif( $user->HasRole('secretaria'))
                            <p class="text-muted text-center">Secretária (o)</p>
                        @elseif( $user->HasRole('gerente'))
                            <p class="text-muted text-center">Gestor</p>
                        @elseif( $user->HasRole('admin'))
                            <p class="text-muted text-center">Adm Sistema</p>
                        @elseif( $user->HasRole('superadmin'))
                            <p class="text-muted text-center">Super Admin</p>
                        @else
                            <p class="text-muted text-center">Não Atribuido</p>
                        @endif
                        {{-- <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Followers</b> <a class="float-right">1,322</a>
                            </li>
                            <li class="list-group-item">
                                <b>Following</b> <a class="float-right">543</a>
                            </li>
                            <li class="list-group-item">
                                <b>Friends</b> <a class="float-right">13,287</a>
                            </li>
                        </ul>
                        <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
                        --}}
                    </div>
                </div>
                <div class="card card-primary">
                    <div class="card-header"><i class="fas fa-home"></i><h3 class="card-title"></h3> Endereço</div>
                    <div class="card-body">
                        @if($user->address)
                            <strong><i class="fas fa-map mr-1"></i> Logradouro</strong>
                            <p class="text-muted">{{ $user->address }}, {{ $user->number }} - {{ $user->district }}</p>
                            <hr>
                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Cidade</strong>
                            <p class="text-muted">{{ $user->city }}/{{ $user->state }}</p>
                            <hr>
                        @else
                            <p>sem logradouro cadastrado</p>
                        @endif
                        {{-- <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>
                        <p class="text-muted">
                            <span class="tag tag-danger">UI Design</span>
                            <span class="tag tag-success">Coding</span>
                            <span class="tag tag-info">Javascript</span>
                            <span class="tag tag-warning">PHP</span>
                            <span class="tag tag-primary">Node.js</span>
                        </p>
                        <hr>
                        <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>
                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum
                            enim neque.</p> --}}
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#dados" data-toggle="tab">Dados Cadastrais</a></li>
                            {{-- <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li> --}}
                            <li class="nav-item"><a class="nav-link" href="#update" data-toggle="tab">Documentos</a></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="dados">
                                <form  class="form-horizontal" action="{{ route('admin.profile.update', ['profile' => $user->id]) }}" method="POST">
                                    @csrf @method('PATCH')
                                    <div class="form-group row">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">E-mail</label>
                                        <div class="col-sm-10">
                                            <input disabled type="email" class="form-control" id="inputEmail" value="{{ $user->email }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-2 col-form-label">Nome</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Nome completo" value="{{ $user->name }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="phone" class="col-sm-2 col-form-label">Telefone</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Telefone" value="{{ $user->phone }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="address" class="col-sm-2 col-form-label">Endereço</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="address" name="address" placeholder="Endereço" value="{{ $user->address }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="number" class="col-sm-2 col-form-label">Número</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="number" name="number" placeholder="Nº" value="{{ $user->number }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="district" class="col-sm-2 col-form-label">Bairro</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="district" name="district" placeholder="Bairro" value="{{ $user->district }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="city" class="col-sm-2 col-form-label">Cidade</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="city" name="city" placeholder="Cidade" value="{{ $user->city }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="state" class="col-sm-2 col-form-label">Estado</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="state" name="state" placeholder="Estado" value="{{ $user->state }}">
                                        </div>
                                    </div>
                                    <input type="hidden" name="id" id="id" value="{{$user->id}}">
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-success">Atualizar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            {{-- <div class="tab-pane" id="timeline">

                                <div class="timeline timeline-inverse">

                                    <div class="time-label">
                                        <span class="bg-danger">
                                            10 Feb. 2014
                                        </span>
                                    </div>


                                    <div>
                                        <i class="fas fa-envelope bg-primary"></i>
                                        <div class="timeline-item">
                                            <span class="time"><i class="far fa-clock"></i> 12:05</span>
                                            <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email
                                            </h3>
                                            <div class="timeline-body">
                                                Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                                weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                                jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                                quora plaxo ideeli hulu weebly balihoo...
                                            </div>
                                            <div class="timeline-footer">
                                                <a href="#" class="btn btn-primary btn-sm">Read more</a>
                                                <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                            </div>
                                        </div>
                                    </div>


                                    <div>
                                        <i class="fas fa-user bg-info"></i>
                                        <div class="timeline-item">
                                            <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>
                                            <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted
                                                your friend request
                                            </h3>
                                        </div>
                                    </div>


                                    <div>
                                        <i class="fas fa-comments bg-warning"></i>
                                        <div class="timeline-item">
                                            <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>
                                            <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post
                                            </h3>
                                            <div class="timeline-body">
                                                Take me to your leader!
                                                Switzerland is small and neutral!
                                                We are more like Germany, ambitious and misunderstood!
                                            </div>
                                            <div class="timeline-footer">
                                                <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="time-label">
                                        <span class="bg-success">
                                            3 Jan. 2014
                                        </span>
                                    </div>


                                    <div>
                                        <i class="fas fa-camera bg-purple"></i>
                                        <div class="timeline-item">
                                            <span class="time"><i class="far fa-clock"></i> 2 days ago</span>
                                            <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos
                                            </h3>
                                            <div class="timeline-body">
                                                <img src="https://placehold.it/150x100" alt="...">
                                                <img src="https://placehold.it/150x100" alt="...">
                                                <img src="https://placehold.it/150x100" alt="...">
                                                <img src="https://placehold.it/150x100" alt="...">
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <i class="far fa-clock bg-gray"></i>
                                    </div>
                                </div>
                            </div> --}}

                            <div class="tab-pane" id="update">
                                @if($driver === null)
                                <h2 style="color: crimson">Usuário sem perfil de motorista</h2>
                                @else
                                <form  class="form-horizontal" action="{{ route('admin.drivers.update', ['driver' => $driver->id]) }}" method="POST">
                                    @csrf @method('PUT')
                                    <div class="form-group row">
                                        <label for="cnh" class="col-sm-2 col-form-label">C.N.H.</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="cnh" name="cnh" value="{{ $driver->cnh }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="validityCnh" class="col-sm-2 col-form-label">Validade CNH</label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control" id="validityCnh" name="validityCnh" value="{{ $driver->validityCnh }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="mopp" class="col-sm-2 col-form-label">Tem MOPP?</label>
                                            <div class="col-sm-10">
                                                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                    <input type="checkbox" @if($driver->mopp) checked @endif class="custom-control-input" id="mopp" name="mopp">
                                                    <label class="custom-control-label" for="mopp"></label>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="moppNumber" class="col-sm-2 col-form-label">Incrição MOPP</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="moppNumber" name="moppNumber" placeholder="somente números" value="{{ $driver->moppNumber }}">
                                        </div>
                                    </div>
                                    {{-- <input type="hidden" name="id" id="id" value="{{$user->id}}"> --}}
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-success">Atualizar</button>
                                        </div>
                                    </div>
                                </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script type="text/javascript" src="{{ asset('js/jquery.mask.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function(){
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
@stop