<div class="tab-pane {{ session('aba') == 'publicacoes' || empty(session('aba')) ? 'active' : '' }}" id="publicacoes">
        <div class="box">
          <div class="box-header">
          </div><!-- /.box-header -->
          <div class="box-body pad">
            <form method="post" action="{{action('Backend\EventosPublicacoesController@store', $evento->id) }}">
              {!! csrf_field() !!}
              <textarea name="texto" class="textarea" placeholder="O que você pensa sobre o evento...." style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px; resize: none;"></textarea>
              <button type="submit" class="btn btn-success pull pull-right">Publicar</button>
            </form>
          </div>
        </div>
        <div class="row">
            <div class="col-md-12">
              <!-- The time line -->
              <ul class="timeline">
                <!-- timeline time label -->
                <li class="time-label">
                  <span class="bg-red">
                    Linha do tempo
                  </span>
                </li>
                <!-- /.timeline-label -->
                <!-- timeline item -->
                @foreach($publicacoes as $publicacao)
                <li>
                  <i class="fa fa-comments bg-blue"></i>
                  <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> {{ $publicacao->present()->createdAtFormatada }}</span>
                    <span class="time"><i class="fa fa-thumbs-o-up"></i> {{ count($publicacao->curtidas) }}</span>
                    <h3 class="timeline-header"><a href="{{action('Backend\UserController@show', $publicacao->usuario->id)}}">{{ $publicacao->usuario->nome }}</a> publicou</h3>
                    <div class="timeline-body">
                      {{ $publicacao->texto }}
                    </div>
                    <div class="timeline-footer">
                      @if($publicacao->usuarioCurtiu($publicacao->id))
                        <a href="{{ action('Backend\EventosPublicacoesCurtidasController@destroy', $publicacao->id) }}" class="btn btn-default btn-xs">Não Curtir</a>
                      @else
                        <a href="{{ action('Backend\EventosPublicacoesCurtidasController@store', $publicacao->id) }}" class="btn btn-default btn-xs">Curtir</a>
                      @endif
                      @if(Auth::user()->donoDaPublicacao($publicacao->usuario_id))
                        <a href="{{ action('Backend\EventosPublicacoesController@destroy', $publicacao->id) }}" class="btn btn-danger btn-xs">Excluir</a>
                      @endif
                    </div>
                  </div>
                </li>
                @endforeach
                @if(count($publicacoes) == 0)
                <li>
                  <div class="timeline-item">
                    <h3 class="timeline-header">Ningúem publicou ainda! Seja o primeiro!</h3>
                  </div>
                </li>
                @endif

                <!-- END timeline item -->
                <li>
                  <i class="fa fa-clock-o bg-gray"></i>
                </li>
              </ul>
            </div><!-- /.col -->
          </div>
</div>
