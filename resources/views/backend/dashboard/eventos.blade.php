<div class="tab-pane {{ session('aba') == 'eventos' || empty(session('aba')) ? 'active' : '' }}" id="activity">

  <!-- Post -->
  @foreach($eventos as $id => $evento)
  <div class="box box-widget">
    <div class="box-header with-border">
      <div class="user-block">
        @if(!empty($evento->usuario->foto))
          <img class="img-circle" src="{{ asset('uploadsDoUsuario/perfil/')}}/{{$evento->usuario->foto}}" alt="Foto do Perfil">
        @else
          <img class="img-circle" src="{{ asset('dist/img/usuario.jpg')}}" alt="Foto do Perfil">
        @endif
        <span class="username"><a href="{{ action('BackendController@detalharEvento', $evento->id) }}">{{ $evento->titulo }}</a></span>
        <span class="description">Publicado por {{ empty($evento->usuario_id) ? 'UFBAcontece' : $evento->usuario->nome }} em {{ $evento->present()->createdAtFormatada }}</span>
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
      @if($evento->usuarioEstaParticipando(Auth::user()->id, $evento->id))
        <a href="{{ action('Backend\ParticipantesController@destroy', $evento->id) }}" class="btn btn-default btn-xs"><i class="fa fa-heart"></i> Não vou mais !</a>
      @else
        <a href="{{ action('Backend\ParticipantesController@store', $evento->id) }}" class="btn btn-default btn-xs"><i class="fa fa-heart-o"></i> Eu vou !</a>
      @endif
      <span class="pull-right text-muted">{{count($evento->participantes)}} presença(s) confirmada(s) - {{count($evento->comentarios)}} comentário(s)</span>
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
            <a href="{{action('Backend\UserController@show', $comentario->usuario->id)}}">{{ $comentario->usuario->nome }}</a>
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
