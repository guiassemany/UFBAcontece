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
    <li class="active"><a href="#">Categorias</a></li>
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
                @foreach($categorias as $categoria)
                <tr>
                  <td>{{ $categoria->id }}</td>
                  <td>{{ $categoria->titulo }}</td>
                  <td>
                    <a class="btn btn-warning" href="{{action('Backend\CategoriasController@edit', $categoria->id)}}"><i class="fa fa-pencil "></i> Editar</a>
                    <a class="btn btn-danger" href="{{action('Backend\CategoriasController@destroy', $categoria->id)}}"><i class="fa fa-trash-o "></i> Excluir</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            </div>
    </div><!-- /.box-body -->
    <div class="box-footer">
        <div class="pull-right">
          {!! $categorias->render() !!}
        </div>
    </div><!-- /.box-footer-->
  </div><!-- /.box -->
  <div class="row">
    <div class="col-md-6">
      <form role="form" method="post" action="{{ action('Backend\CategoriasController@store') }}">
        {!! csrf_field() !!}
      <div class="box box-warning">
        <div class="box-header with-border">
          <h3 class="box-title">Adicionar Categoria</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <div class="form-group">
              <label>Categoria</label>
              <input type="text" class="form-control" name="titulo" placeholder="Título da Categoria ..." required>
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
