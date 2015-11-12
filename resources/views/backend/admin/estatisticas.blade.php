@extends('backend.layout.master')

@section('conteudo')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    UFBAcontece
    <small>Estatísticas</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Início</a></li>
    <li class="active"><a href="#"><i class="fa fa-line-chart"></i> Estatísticas</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$numEventos}}</h3>
              @if($numEventos != 1)
              <p>Eventos</p>
              @else
              <p>Evento</p>
              @endif
            </div>
            <div class="icon">
              <i class="fa fa-calendar"></i>
            </div>
            <a href="#" class="small-box-footer">
              &nbsp;
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{$numPresencas}}</h3>
              @if($numPresencas != 1)
              <p>Presenças Confirmadas</p>
              @else
              <p>Presença Confirmada</p>
              @endif
            </div>
            <div class="icon">
              <i class="fa fa-heart"></i>
            </div>
            <a href="#" class="small-box-footer">
              &nbsp;
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{$numUsuarios}}</h3>
              @if($numUsuarios != 1)
              <p>Usuários Cadastrados</p>
              @else
              <p>Usuário Cadastrado</p>
              @endif

            </div>
            <div class="icon">
              <i class="fa fa-user-plus"></i>
            </div>
            <a href="#" class="small-box-footer">
              &nbsp;
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{$numComentarios}}</h3>

              <p>Comentários e Publicações</p>
            </div>
            <div class="icon">
              <i class="fa fa-commenting-o"></i>
            </div>
            <a href="#" class="small-box-footer">
              &nbsp;
            </a>
          </div>
        </div>
        <!-- ./col -->
      </div>
<div class="row">
  <div class="col-md-6">
    <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Últimos cadastros</h3>

                  <div class="box-tools pull-right">
                    <span class="label label-danger"></span>
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
                        <img src="{{ asset('uploadsDoUsuario/perfil/')}}/{{$usuario->foto}}" alt="Foto do perfil">
                      @else
                        <img style="width:100px;" src="{{ asset('dist/img/usuario.jpg') }}" alt="Foto do perfil">
                      @endif
                      <a class="users-list-name" href="{{action('Backend\UserController@show', $usuario->id)}}">{{$usuario->nome}}</a>
                      <span class="users-list-date">{{$usuario->present()->createdAtFormatada}}</span>
                    </li>
                    @endforeach
                  </ul>
                  <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="{{action('Backend\UserController@index')}}" class="uppercase">Ver todos os usuários</a>
                </div>
                <!-- /.box-footer -->
              </div>
  </div> <!-- Termino MD 6 -->
  <div class="col-md-6">
    <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Eventos adicionados recentemente</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="products-list product-list-in-box">
                @foreach($eventos as $evento)
                <li class="item">
                  <div class="product-img">
                    @if(!empty($evento->imagem))
                      <img src="{{ asset('uploadsDoUsuario/')}}/{{$evento->imagem}}" alt="Imagem do Evento">
                    @else
                      <img src="{{ asset('uploadsDoUsuario/')}}/eventoDefault.jpg" alt="Imagem do Evento">
                    @endif

                  </div>
                  <div class="product-info">
                    <a href="{{action('BackendController@detalharEvento', $evento->id)}}" class="product-title">{{$evento->titulo}}
                      <span class="label label-success pull-right">{{$evento->categoria->titulo}}</span></a>
                        <span class="product-description">
                          {{$evento->descricao}}
                        </span>
                  </div>
                </li>
                @endforeach
                <!-- /.item -->
              </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
              <a href="{{action('Backend\EventosController@index')}}" class="uppercase">Ver todos os eventos</a>
            </div>
            <!-- /.box-footer -->
          </div>
  </div>


</div>
</section><!-- /.content -->
@endsection


@section('scriptsExtra')
@endsection
