@extends('backend.layout.master')

@section('conteudo')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Página Inicial
    <small>UFBAcontece</small>
  </h1>
  <ol class="breadcrumb">
    <li class="active"><a href="#"><i class="fa fa-dashboard"></i> Início</a></li>
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
                  <h3 class="profile-username text-center">{{ Auth::user()->nome }}</h3>
                  <p class="text-muted text-center">{{ Auth::user()->email }}</p>

                  <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                      <b>Eventos Publicados</b> <a class="pull-right">1,322</a>
                    </li>
                    <li class="list-group-item">
                      <b>Following</b> <a class="pull-right">543</a>
                    </li>
                    <li class="list-group-item">
                      <b>Friends</b> <a class="pull-right">13,287</a>
                    </li>
                  </ul>

                  <a href="#" class="btn btn-primary btn-block"><b>Publicar Evento</b></a>
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
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="{{ session('aba') == 'eventos' || empty(session('aba')) ? 'active' : '' }}">
                    <a href="#activity" data-toggle="tab" aria-expanded="true">Eventos</a>
                  </li>
                  <li class="{{ session('aba') == 'settings' ? 'active' : '' }}">
                    <a href="#settings" data-toggle="tab" aria-expanded="false">Perfil</a>
                  </li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane {{ session('aba') == 'eventos' || empty(session('aba')) ? 'active' : '' }}" id="activity">

                    <!-- Post -->
                    @foreach($eventos as $id => $evento)
                    <div class="box box-widget">
                      <div class="box-header with-border">
                        <div class="user-block">
                          <img class="img-circle" src="../dist/img/user1-128x128.jpg" alt="user image">
                          <span class="username"><a href="#">{{ $evento->titulo }}</a></span>
                          <span class="description">Publicado por {{ empty($evento->usuario_id) ? 'UFBAcontece' : $evento->usuario->nome }} às 7:30 PM today</span>
                        </div><!-- /.user-block -->
                        <div class="box-tools">
                          <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                          <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div><!-- /.box-tools -->
                      </div><!-- /.box-header -->
                      <div class="box-body" style="display: block;">
                        <p>
                          {!! $evento->descricao !!}
                        </p>
                        <button class="btn btn-default btn-xs"><i class="fa fa-heart-o"></i> Eu vou !</button>
                        <button class="btn btn-default btn-xs"><i class="fa fa-heart"></i> Não vou mais!</button>
                        <button class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Curtir</button>
                        <button class="btn btn-default btn-xs"><i class="fa fa-thumbs-up"></i> Descurtir</button>
                        <span class="pull-right text-muted">127 curtir - {{count($evento->comentarios)}} comentário(s)</span>
                      </div><!-- /.box-body -->
                      @if(count($evento->comentarios) > 0)
                      <div class="box-footer box-comments" style="display: block;">
                        @foreach($evento->comentarios as $id => $comentario)
                        <div class="box-comment">
                          <!-- User image -->
                          @if(!empty($comentario->usuario->foto))
                            <img class="img-circle img-sm" src="{{ asset('uploadsDoUsuario/perfil/')}}/{{ $comentario->usuario->foto }}" alt="Foto do perfil">
                          @else
                            <img class="img-circle img-sm" src="{{ asset('dist/img/usuario.jpg') }}" alt="Foto do perfil">
                          @endif

                          <div class="comment-text">
                            <span class="username">
                              {{ $comentario->usuario->nome }}
                              @if(Auth::user()->id == $comentario->usuario_id)
                              <a type="button" href="{{ action('Backend\ComentariosController@destroy', $comentario->id) }}" class="btn btn-sm  btn-flat pull-right">
                                <i class="fa fa-trash"></i>
                              </a>
                              @endif
                              <span class="text-muted pull-right">{{ $comentario->present()->dataHoraFormatada }}</span>
                            </span><!-- /.username -->
                            {{ $comentario->comentario }}
                          </div><!-- /.comment-text -->
                        </div><!-- /.box-comment -->
                        @endforeach
                      </div><!-- /.box-footer -->
                      @endif
                      <div class="box-footer" style="display: block;">
                        <form action="{{ action('Backend\ComentariosController@store', $evento->id) }}" method="post">
                          {!! csrf_field() !!}

                          @if(!empty(Auth::user()->foto))
                            <img class="img-responsive img-circle img-sm" src="{{asset('uploadsDoUsuario/perfil/')}}/{{Auth::user()->foto}}" alt="Foto do Perfil">
                          @else
                            <img class="img-responsive img-circle img-sm" src="{{ asset('dist/img/usuario.jpg') }}" alt="Foto do Perfil">
                          @endif
                          <!-- .img-push is used to add margin to elements next to floating images -->
                          <div class="img-push">
                            <input type="hidden" name="evento_id"value="{{ $evento->id }}">
                            <input type="text" name="comentario" class="form-control input-sm" placeholder="Escreva seu comentário">
                          </div>
                        </form>
                      </div><!-- /.box-footer -->
                    </div>
                    @endforeach
                    <!-- /.post -->

                  </div><!-- /.tab-pane -->

                  <div class="tab-pane {{ session('aba') == 'settings' ? 'active' : '' }}" id="settings">
                    @if(session('statusPerfil'))
                    <div class="alert alert-success alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <h4>	<i class="icon fa fa-check"></i> Sucesso!</h4>
                      {{ session('statusPerfil') }}
                    </div>
                    @endif
                    <form class="form-horizontal" method="post"  action="{{ action('Backend\UserController@update') }}" enctype="multipart/form-data" >
                      {!! csrf_field() !!}
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Nome</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName" placeholder="Nome" name="nome" value="{{ Auth::user()->nome }}" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" placeholder="Email" value="{{ Auth::user()->email }}" disabled>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Curso</label>
                        <div class="col-sm-10">
                        <select class="form-control" name="curso_id" >
                          @foreach($cursos as $id => $curso)
                            <option value="{{$id}}"  {{ $id == Auth::user()->curso_id ? 'selected' : ''}} >{{$curso}}</option>
                          @endforeach
                        </select>
                      </div>
                      </div>
                      <div class="form-group">
                        <label for="inputExperience" class="col-sm-2 control-label">Unidade</label>
                        <div class="col-sm-10">
                          <select class="form-control" name="unidade_id" >
                            @foreach($unidades as $id => $unidade)
                              <option value="{{$id}}"  {{ $id == Auth::user()->unidade_id ? 'selected' : ''}} >{{$unidade}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputSkills" class="col-sm-2 control-label">Apresentação</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputExperience" name="apresentacao" placeholder="Apresente-se em poucas palavras!">{{ Auth::user()->apresentacao }}</textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="foto" class="col-sm-2 control-label">Foto do Perfil</label>
                        <div class="col-sm-10">
                          <input type="file" name="foto" id="fotoPerfil" >
                          <p class="help-block">se você colocar uma nova imagem, sua antigo imagem do perfil será substituida.</p>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Atualizar Perfil</button>
                        </div>
                      </div>
                    </form>
                  </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
              </div><!-- /.nav-tabs-custom -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section>
@endsection
