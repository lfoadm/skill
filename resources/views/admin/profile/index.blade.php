@extends('adminlte::page')

@section('title', 'Grupo de usuários')

@section('content_header')
    <h1>Perfil</h1>
@stop

@section('content')

<section class="content">
    @if(session('message'))
    <div class="alert alert-primary" role="alert">
        {{ session('message') }}
    </div>
    @endif
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
                        <strong><i class="fas fa-map mr-1"></i> Logradouro</strong>
                        <p class="text-muted">Rua Tal, 123</p>
                        <hr>
                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Cidade</strong>
                        <p class="text-muted">Iturama/MG</p>
                        <hr>
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
                            <li class="nav-item"><a class="nav-link active" href="#dados" data-toggle="tab">Dados</a></li>
                            {{-- <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li> --}}
                            <li class="nav-item"><a class="nav-link" href="#update" data-toggle="tab">Atualizar dados</a></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="dados">
                                {{-- inserir dados --}}
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
                                        <label for="phone" class="col-sm-2 col-form-label">Nome</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Telefone" value="{{ $user->phone }}" data-inputmask="'mask': ['(99) 99999-9999']" data-mask="(__) _____-____" inputmode="text">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="cnh" class="col-sm-2 col-form-label">CNH</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="cnh" name="cnh" placeholder="Cnh" value="{{ $user->cnh }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="validityCnh" class="col-sm-2 col-form-label">Validade</label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control" id="validityCnh" name="validityCnh" value="{{ $user->validityCnh }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputSkills" class="col-sm-2 col-form-label">Tem MOPP?</label>
                                            <div class="col-sm-10">
                                                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                    <input type="checkbox" @if($user->mopp) checked @endif class="custom-control-input" id="mopp" name="mopp">
                                                    <label class="custom-control-label" for="mopp"></label>
                                                </div>
                                                {{-- <label><input type="checkbox"  value="{{ $user->mopp }}" name="mopp"> Sim</label> --}}
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="moppNumber" class="col-sm-2 col-form-label">Incrição MOPP</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="moppNumber" name="moppNumber" placeholder="somente números" value="{{ $user->moppNumber }}">
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
    
@stop