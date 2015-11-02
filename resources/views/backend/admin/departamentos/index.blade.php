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
    <li class="active"><a href="#">Departamentos</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  @if (session('status'))
  <div class="alert alert-success alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4>	<i class="icon fa fa-check"></i> Notificação!</h4>
    {{ session('status') }}
  </div>
@endif
  <!-- Default box -->
  <div class="box">
    <div class="box-body">
      <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody>
                <tr>
                  <th>#</th>
                  <th>Título</th>
                  <th>Ações</th>
                </tr>
                @foreach($departamentos as $departamento)
                <tr>
                  <td>{{ $departamento->id }}</td>
                  <td>{{ $departamento->titulo }}</td>
                  <td>
                    <a class="btn btn-warning" href="{{action('Backend\DepartamentosController@edit', $departamento->id)}}"><i class="fa fa-pencil "></i> Editar</a>
                    <a class="btn btn-danger" href="{{action('Backend\DepartamentosController@destroy', $departamento->id)}}"><i class="fa fa-trash-o "></i> Excluir</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            </div>
    </div><!-- /.box-body -->
    <div class="box-footer">
        <div class="pull-right">
          {!! $departamentos->render() !!}
        </div>
    </div><!-- /.box-footer-->
  </div><!-- /.box -->
  <div class="row">
    <div class="col-md-6">
      <form role="form" method="post" action="{{ action('Backend\DepartamentosController@store') }}">
        {!! csrf_field() !!}
      <div class="box box-warning">
        <div class="box-header with-border">
          <h3 class="box-title">Adicionar Departamento</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <div class="form-group">
              <label>Departamento</label>
              <input type="text" class="form-control" name="titulo" placeholder="Nome do Departamento ...">
            </div>
        </div><!-- /.box-body -->
        <div class="box-footer">
          <button type="submit" class="btn btn-info pull-left">Adicionar</button>
        </div><!-- /.box-footer-->
        </form>
      </div>
    </div>
  </div>
</section><!-- /.content -->
@endsection
