@extends('backend.layout.master')


@section('conteudo')
<!-- Content Header (Page header) -->
<section class="content-header">
  <ol class="breadcrumb">
    <li class=""><a href="#"><i class="fa fa-dashboard"></i> Início</a></li>
    <li class=""><a href="#"><i class="fa fa-calendar"></i> Evento</a></li>
    <li class="active"><a href="#"><i class="fa fa-calendar"></i> {{ $evento->titulo }} </a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

          <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
              <div class="box box-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-black" style="background: url({{ asset('uploadsDoUsuario/')}}/{{$evento->imagem}}) no-repeat center center fixed; -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;">
                  <h3 class="widget-user-username">{{$evento->titulo}}</h3>
                  <h5 class="widget-user-desc">{{$evento->endereco}}</h5>
                </div>
                <div class="widget-user-image">
                  <img class="img-circle" src="{{ asset('uploadsDoUsuario/perfil/')}}/{{$evento->usuario->foto}}" alt="Foto do perfil">
                </div>
                <div class="box-footer">
                  <div class="row">
                    <div class="col-sm-4 border-right">
                      <div class="description-block">
                        <h5 class="description-header">{{ count($evento->participantes) }}</h5>
                        <span class="description-text">Presenças confirmadas</span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-sm-4 border-right">
                      <div class="description-block">
                        <h5 class="description-header">13</h5>
                        <span class="description-text">Dias para começar</span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-sm-4">
                      <div class="description-block">
                        <h5 class="description-header">35</h5>
                        <span class="description-text">Curtidas</span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                  </div><!-- /.row -->
                </div>
              </div>
            </div><!-- /.col -->
            <div class="col-md-2"></div>
          </div>
          <div class="row">
            <div class="col-md-8">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="{{ session('aba') == 'publicacoes' || empty(session('aba')) ? 'active' : '' }}">
                    <a href="#activity" data-toggle="tab" aria-expanded="true">Publicações</a>
                  </li>
                  <li class="{{ session('aba') == 'agenda' ? 'active' : '' }}">
                    <a id="linkCalendario" href="#calendario" data-toggle="tab" aria-expanded="false">Agenda</a>
                  </li>
                  <li class="{{ session('aba') == 'local' ? 'active' : '' }}">
                    <a href="#settings" data-toggle="tab" aria-expanded="false">Local</a>
                  </li>
                </ul>
                <div class="tab-content">



                </div><!-- /.tab-content -->
              </div><!-- /.nav-tabs-custom -->
            </div><!-- /.col -->
            <div class="col-md-4">
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Participantes x Cursos</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                    <canvas id="pieChart" style="height: 173px; width: 347px;" width="347" height="173"></canvas>
                </div><!-- /.box-body -->
              </div>
            </div>
          </div><!-- /.row -->

        </section>
@endsection

@section('scriptsExtra')
<script src="{{ asset('plugins/chartjs/Chart.min.js') }}"></script>
<script>
      $(function () {

        //-------------
        //- Gráfico de Participantes x Curso -
        //-------------
        //
        var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
        var pieChart = new Chart(pieChartCanvas);
        var PieData = [
          {
            value: 700,
            color: "#f56954",
            highlight: "#f56954",
            label: "Sistemas de Informação"
          },
          {
            value: 500,
            color: "#00a65a",
            highlight: "#00a65a",
            label: "Física"
          },
          {
            value: 400,
            color: "#f39c12",
            highlight: "#f39c12",
            label: "Matemática"
          },
          {
            value: 600,
            color: "#00c0ef",
            highlight: "#00c0ef",
            label: "Direito"
          },
          {
            value: 300,
            color: "#3c8dbc",
            highlight: "#3c8dbc",
            label: "Dança"
          },
          {
            value: 100,
            color: "#d2d6de",
            highlight: "#d2d6de",
            label: "Artes"
          }
        ];
        //Opções disponíveis do gráfico
        var pieOptions = {
          segmentShowStroke: true,
          segmentStrokeColor: "#fff",
          segmentStrokeWidth: 2,
          percentageInnerCutout: 50,
          animationSteps: 100,
          animationEasing: "easeOutBounce",
          animateRotate: true,
          animateScale: false,
          responsive: true,
          maintainAspectRatio: true,
          legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
        };

        pieChart.Doughnut(PieData, pieOptions);


      });
    </script>
@endsection
