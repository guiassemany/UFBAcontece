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
                    <span class="time"><i class="fa fa-clock-o"></i> {{ $publicacao->created_at }}</span>
                    <h3 class="timeline-header"><a href="#">{{ $publicacao->usuario->nome }}</a> publicou</h3>
                    <div class="timeline-body">
                      {{ $publicacao->texto }}
                    </div>
                    <div class="timeline-footer">
                      <a class="btn btn-primary btn-xs">Curtir</a>
                      <a class="btn btn-danger btn-xs">Excluir</a>
                    </div>
                  </div>
                </li>
                @endforeach
                <!-- END timeline item -->
                <li>
                  <i class="fa fa-clock-o bg-gray"></i>
                </li>
              </ul>
            </div><!-- /.col -->
          </div>
</div>
