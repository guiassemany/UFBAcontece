<div class="tab-pane {{ session('aba') == 'admAgenda' ? 'active' : '' }}" id="admAgenda">
  <div class="box ">
    <div class="box-body">
      <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <tbody>
            <tr>
              <th>Título</th>
              <th>Dia/Hora Início</th>
              <th>Dia/Hora Fim</th>
              <th>Ações</th>
            </tr>
            @foreach($evento->agendas as $agenda)
            <tr>
              <td>{{ $agenda->titulo }}</td>
              <td>{{ $agenda->present()->diaHoraInicioFormatada }}</td>
              <td>{{ $agenda->present()->diaHoraFimFormatada }}</td>
              <td>
                <a class="btn btn-danger" href="{{action('Backend\EventosAgendasController@destroy', $agenda->id)}}"><i class="fa fa-trash-o "></i> Excluir</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <hr />
      <div class="box box-primary">
        <form method="post" action="{{action('Backend\EventosAgendasController@store', $evento->id)}}">
          {!! csrf_field() !!}
                <div class="box-header">
                  <h3 class="box-title">Cadastrar nova atividade na agenda</h3>
                </div>
                <div class="box-body">
                  <div class="form-group">
                    <label>Título</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-clock-o"></i>
                      </div>
                      <input type="text" name="titulo" class="form-control pull-right active" id="titulo">
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  <div class="form-group">
                    <label>Sobre</label>
                    <div class="input-group"  style="display:block">
                      <textarea style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px; resize: none;" name="sobre"></textarea>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  <div class="form-group">
                    <label>Data e Hora - Início e Fim:</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-clock-o"></i>
                      </div>
                      <input type="text" name="dataHora" class="form-control pull-right active" id="dataHora">
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                </div><!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-success">Adicionar atividade ao evento</button>
                  </div>
              </form>
              </div>
    </div><!-- /.box-body -->
  </div>
</div>
