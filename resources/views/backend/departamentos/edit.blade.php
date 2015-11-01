@extends('backend.layout.master')

@section('conteudo')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Departamentos
    <small>Manutenção de Departamentos</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Início</a></li>
    <li ><a href="#">Departamentos</a></li>
    <li class="active"><a href="#">Editar departamento - {{ $departamento->titulo }}</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  @if (session('status'))
  <div class="alert alert-success alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4>	<i class="icon fa fa-check"></i> Sucesso!</h4>
    {{ session('status') }}
  </div>
  @endif
  <div class="row">
    <div class="col-md-6">
      <form role="form" method="post" action="{{ action('Backend\DepartamentosController@update', $departamento->id) }}">
        {!! csrf_field() !!}
      <div class="box box-warning">
        <div class="box-header with-border">
          <h3 class="box-title">Editar Departamento {{ $departamento->titulo }}</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <div class="form-group">
              <label>Departamento</label>
              <input type="text" class="form-control" name="titulo" value="{{ $departamento->titulo }}" placeholder="Nome do Departamento ...">
            </div>
        </div><!-- /.box-body -->
        <div class="box-footer">
          <button type="submit" class="btn btn-info pull-left">Atualizar</button>
          <a href="{{action('Backend\DepartamentosController@index')}}" class="btn btn-danger pull-right">Cancelar</a>
        </div><!-- /.box-footer-->
        </form>
      </div>
    </div>
  </div>
</section><!-- /.content -->
@endsection
