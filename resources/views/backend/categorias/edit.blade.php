@extends('backend.layout.master')

@section('conteudo')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Categorias
    <small>Manutenção de Categorias</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Início</a></li>
    <li ><a href="#">Categorias</a></li>
    <li class="active"><a href="#">Editar categoria - {{ $categoria->titulo }}</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-6">
      <form role="form" method="post" action="{{ action('Backend\CategoriasController@update', $categoria->id) }}">
        {!! csrf_field() !!}
      <div class="box box-warning">
        <div class="box-header with-border">
          <h3 class="box-title">Editar Categoria {{ $categoria->titulo }}</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <div class="form-group">
              <label>Categoria</label>
              <input type="text" class="form-control" name="titulo" value="{{ $categoria->titulo }}" placeholder="Título da Categoria ..." required>
            </div>
        </div><!-- /.box-body -->
        <div class="box-footer">
          <button type="submit" class="btn btn-info pull-left">Atualizar</button>
          <a href="{{action('Backend\CategoriasController@index')}}" class="btn btn-danger pull-right">Cancelar</a>
        </div><!-- /.box-footer-->
        </form>
      </div>
    </div>
  </div>
</section><!-- /.content -->
@endsection
