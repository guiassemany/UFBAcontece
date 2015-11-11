@extends('backend.layout.master')

@section('conteudo')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    UFBAcontece
    <small>Usuários</small>
  </h1>
  <ol class="breadcrumb">
    <li class=""><a href="#"><i class="fa fa-dashboard"></i> Início</a></li>
    <li class="active"><a href="#"><i class="fa fa-group"></i> Buscar Usuários</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

          <div class="row">
            <div class="col-md-3">

              <!-- Profile Image -->
              <div class="box box-primary">
                <div class="box-body box-profile">
                  @if(!empty(Auth::user()->foto))
                    <img class="profile-user-img img-responsive img-circle" src="{{ asset('uploadsDoUsuario/perfil/')}}/{{Auth::user()->foto}}" alt="Foto do perfil">
                  @else
                    <img class="profile-user-img img-responsive img-circle" src="{{ asset('dist/img/usuario.jpg') }}" alt="Foto do perfil">
                  @endif
                  <h3 class="profile-username text-center"><a href="{{action('Backend\UserController@show', Auth::user()->id)}}">{{ Auth::user()->nome }}</a></h3>
                  <p class="text-muted text-center">{{ Auth::user()->email }}</p>

                  <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                      <b>Eventos Publicados</b> <a class="pull-right">{{count(Auth::user()->eventos)}}</a>
                    </li>
                  </ul>

                  <a href="{{action('BackendController@cadastrarEvento')}}" class="btn btn-primary btn-block"><b>Publicar Evento</b></a>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

              <!-- About Me Box -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Sobre mim</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <strong><i class="fa fa-book margin-r-5"></i>  Curso</strong>
                  <p class="text-muted">
                    {{ Auth::user()->curso->titulo }}
                  </p>

                  <hr>

                  <strong><i class="fa fa-map-marker margin-r-5"></i> Campi</strong>
                  <p class="text-muted">{{ Auth::user()->unidade->titulo }}</p>

                  <hr>

                  <strong><i class="fa fa-file-text-o margin-r-5"></i> Apresentação</strong>
                  <p>{{ Auth::user()->apresentacao }}</p>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
            <div class="col-md-9">
                <div class="tab-content">
                  <form method="post" action="{{ action('Backend\UserController@index') }}">
                  {!! csrf_field() !!}
                  <div class="box box-danger">
                  <div class="box-header with-border">
                    <h3 class="box-title">Pesquisa</h3>
                  </div>
                  <div class="box-body">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
                    <input type="text" class="form-control" name="termoPesquisa" placeholder="Nome do usuário">
                  </div>
                  </div>
                  </div>
                  </form>
                <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Usuários do UFBAcontece</h3>

                  <div class="box-tools pull-right">
                    @if(count($usuarios) > 0)
                      <span class="label label-success">Exibindo {{ count($usuarios) }} Usuário(s)</span>
                    @else
                      <span class="label label-danger">Nenhum usuário encontrado</span>
                    @endif
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <ul class="users-list clearfix">
                    @foreach($usuarios as $usuario)
                    <li>
                      @if(!empty($usuario->foto))
                        <img src="{{ asset('uploadsDoUsuario/perfil/')}}/{{$usuario->foto}}" alt="Foto do Perfil">
                      @else
                        <img src="{{ asset('dist/img/usuario.jpg') }}" alt="Foto do Perfil">
                      @endif
                      <a class="users-list-name" href="{{ action('Backend\UserController@show', $usuario->id) }}">{{ $usuario->nome }}</a>
                      <span class="users-list-date">Cadastrado desde {{ $usuario->present()->createdAtFormatada }}</span>
                    </li>
                    @endforeach
                  </ul>
                  <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                  {!! $usuarios->render() !!}
                </div>
                <!-- /.box-footer -->
              </div>


                </div><!-- /.tab-content -->
              
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section>
@endsection




