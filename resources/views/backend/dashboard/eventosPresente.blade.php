@extends('backend.layout.master')

@section('conteudo')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Eventos
    <small>Confirmei presença</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Início</a></li>
    <li ><a href="#">Eventos</a></li>
    <li class="active"><a href="#">Presença confirmada</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    @foreach($eventos as $evento)
    <div class="col-md-4">
              <div class="box box-widget widget-user">
                <div class="widget-user-header bg-black" style="background: url('{{asset('uploadsDoUsuario/eventoDefault.jpg')}}') center center;">
                </div>
                <div class="box-footer">
                  <div class="row">
                    <div class="col-sm-6 border-right">
                      <div class="description-block">
                        <h5 class="description-header">Endereço</h5>
                        <span class="description-text">{{$evento->endereco}}</span>
                      </div>
                    </div>
                    <div class="col-sm-6 border-right">
                      <div class="description-block">
                        <h5 class="description-header">EVENTO</h5>
                        <span class="description-text"><a href="{{action('BackendController@detalharEvento', $evento->id)}}">{{$evento->titulo}}</a></span>
                      </div>
                    </div>
                  </div><!-- /.row -->
                </div>
              </div>
            </div>
    @endforeach
  </div>
</section><!-- /.content -->
@endsection
