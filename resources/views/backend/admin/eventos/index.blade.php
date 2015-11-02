@extends('backend.layout.master')

@section('conteudo')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Eventos
    <small>Gerenciamento dos eventos cadastrados</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Início</a></li>
    <li class="active"><a href="#">Eventos</a></li>
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
    <div class="box-header with-border">
      <h3 class="box-title">Eventos</h3>
      <div class="box-tools pull-right">
        <a href="{{ action('Backend\EventosController@create') }}"class="btn btn-sm btn-success">Cadastrar novo evento</a>
        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
      </div>
    </div>
    <div class="box-body">
      <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody><tr>
                  <th>Título</th>
                  <th>Categoria</th>
                  <th>Departamento</th>
                  <th>Data de Início</th>
                  <th>Data de Fim</th>
                  <th>Status</th>
                  <th>Ações</th>
                </tr>
                @foreach($eventos as $evento)
                <tr>
                  <td>{{ $evento->titulo }}</td>
                  <td>{{ $evento->categoria->titulo }}</td>
                  <td>{{ $evento->departamento->titulo }}</td>
                  <td>{{ $evento->present()->dataInicioFormatada }}</td>
                  <td>{{ $evento->present()->dataFimFormatada }}</td>
                  <td>
                    @if($evento->ativo == 'N')
                      <span class="label label-danger">{{ $evento->present()->status }}</span>
                    @else
                      <span class="label label-success">{{ $evento->present()->status }}</span>
                    @endif
                  </td>
                  <td>
                    <a class="btn btn-warning" href="{{action('Backend\EventosController@edit', $evento->id)}}"><i class="fa fa-pencil "></i> Editar</a>
                    <a class="btn btn-danger" href="{{action('Backend\EventosController@destroy', $evento->id)}}"><i class="fa fa-trash-o "></i> Excluir</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            </div>
    </div><!-- /.box-body -->
    <div class="box-footer">
      <div class="pull-right">
        {!! $eventos->render() !!}
      </div>
    </div><!-- /.box-footer-->
  </div><!-- /.box -->

</section><!-- /.content -->
@endsection
