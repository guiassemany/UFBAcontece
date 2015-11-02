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
