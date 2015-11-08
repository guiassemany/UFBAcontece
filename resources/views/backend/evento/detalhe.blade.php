@extends('backend.layout.master')

@section('cssExtra')
<link rel="stylesheet" href="{{ asset('plugins/fullcalendar/fullcalendar.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/fullcalendar/fullcalendar.print.css') }}" media="print">
<link rel="stylesheet" href="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
@endsection

@section('conteudo')
<!-- Content Header (Page header) -->
<section class="content-header"><h1>

  <small></small>
</h1>
  <ol class="breadcrumb">
    <li class=""><a href="#"><i class="fa fa-dashboard"></i> Início</a></li>
    <li class=""><a href="#"><i class="fa fa-calendar"></i> Evento</a></li>
    <li class="active"><a href="#"><i class="fa fa-calendar"></i> {{ $evento->titulo }} </a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
          <div class="row">
            <div class="col-md-8">
              <div class="box box-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-black" style="background: url({{ asset('uploadsDoUsuario/')}}/{{$evento->imagem}}) no-repeat center center fixed; -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;">
                  <!-- <h3 class="widget-user-username">{{$evento->titulo}}</h3>
                  <h5 class="widget-user-desc">{{$evento->endereco}}</h5> -->
                </div>
                <div class="widget-user-image">
                  <img class="img-circle" src="{{ asset('uploadsDoUsuario/perfil/')}}/{{$evento->usuario->foto}}" alt="Foto do perfil">
                </div>
                <div class="box-footer">
                  <div class="row">
                    <div class="col-sm-4 border-right">
                      <div class="description-block">
                        <h5 class="description-header">Local</h5>
                        <span class="description-text">{{$evento->endereco}}</span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-sm-4 border-right">
                      <div class="description-block">
                        <h5 class="description-header">Evento</h5>
                        <span class="description-text">{{$evento->titulo}}</span>
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
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="{{ session('aba') == 'sobre' ? 'active' : '' }}">
                    <a href="#sobre" data-toggle="tab" aria-expanded="false">Sobre o Evento</a>
                  </li>
                  <li class="{{ session('aba') == 'publicacoes' || empty(session('aba')) ? 'active' : '' }}">
                    <a href="#publicacoes" data-toggle="tab" aria-expanded="true">Publicações</a>
                  </li>
                  <li class="{{ session('aba') == 'agenda' ? 'active' : '' }}">
                    <a id="linkCalendario" href="#calendario" data-toggle="tab" aria-expanded="false">Agenda</a>
                  </li>
                  <li class="{{ session('aba') == 'local' ? 'active' : '' }}">
                    <a href="#local" data-toggle="tab" aria-expanded="false">Local</a>
                  </li>
                </ul>
                <div class="tab-content">
                  @include('backend.evento.sobre')
                  @include('backend.evento.publicacoes')
                  @include('backend.evento.agenda')
                  @include('backend.evento.local')
                </div><!-- /.tab-content -->
              </div><!-- /.nav-tabs-custom -->
            </div><!-- /.col -->
            <div class="col-md-4">
              <div class="info-box bg-blue">
                <span class="info-box-icon"><i class="fa fa-heart-o"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Presenças Confimadas</span>
                  <span class="info-box-number">41,410</span>
                  <div class="progress">
                    <div class="progress-bar" style="width: 70%"></div>
                  </div>
                  <span class="progress-description">
                    Cresceu 70% em 30 dias
                  </span>
                </div>
              </div>
              <div class="info-box bg-red">
                <span class="info-box-icon"><i class="fa fa-comments-o"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Cometários</span>
                  <span class="info-box-number">41,410</span>
                  <div class="progress">
                    <div class="progress-bar" style="width: 70%"></div>
                  </div>
                  <span class="progress-description">
                    Cresceu 70% em 30 dias
                  </span>
                </div>
              </div>
              <div class="info-box bg-green">
                <span class="info-box-icon"><i class="fa fa-thumbs-o-up"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Curtidas</span>
                  <span class="info-box-number">41,410</span>
                  <div class="progress">
                    <div class="progress-bar" style="width: 70%"></div>
                  </div>
                  <span class="progress-description">
                    Cresceu 70% em 30 dias
                  </span>
                </div>
              </div>
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
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('plugins/fullcalendar/fullcalendar.min.js') }}"></script>
<script src="{{ asset('plugins/fullcalendar/lang/pt-br.js') }}"></script>
<script src="http://maps.google.com/maps/api/js"></script>
<script src="{{ asset('plugins/chartjs/Chart.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<script>
      $(function () {

        //-------------
        //- Gráfico de Participantes x Curso -
        //-------------
        //
        var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
        var pieChart = new Chart(pieChartCanvas);

        //Cores disponíveis para o gráfico
        var cores = ['#4CAF50', '#03A9F4', '#673AB7', '#E91E63', '#FF9800', '#3F51B5', '#CDDC39'];

        //Inicio nos dados do gráfico
        var PieData = [];

        //Requisição Ajax para criar instância do calendário
        $.ajax({
           url: "/painel/evento/{{$evento->id}}/pxc",
           dataType: "json",
           success: function(json){
             $.each(json, function(i, item) {

                var parteGrafico = {
                    value: json[i].numero,
                    color: cores[Math.floor(Math.random()*cores.length)], //"#f39c12", //yellow
                    highlight: cores[Math.floor(Math.random()*cores.length)], //"#f39c12", //yellow,
                    label: json[i].titulo,
                };

                PieData.push(parteGrafico);

              });
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
            }

        });



      });
    </script>
<script>
    $(function () {

      /* Inicializa o calendário
       -----------------------------------------------------------------*/
      //Inicia o array que irá guardas os objetos do calendário
      var eventosCal = [];

      //Cores disponíveis para os eventos do calendário
      var cores = ['#4CAF50', '#03A9F4', '#673AB7', '#E91E63', '#FF9800', '#3F51B5', '#CDDC39'];

      //Requisição Ajax para criar instância do calendário
      $.ajax({
         url: "/painel/eventosCalendario/",
         dataType: "json",
         success: function(json){
           $.each(json, function(i, item) {
              var evento = {
                  title: json[i].titulo,
                  start: json[i].data_inicio,
                  end: json[i].data_fim,
                  backgroundColor: cores[Math.floor(Math.random()*cores.length)], //"#f39c12", //yellow
                  borderColor: "#F5F5F5", //yellow
                  className: "calendarioNegrito"
              };
              eventosCal.push(evento);

            });

            $('#calendar').fullCalendar({
              header: {
                left: 'prev,next today',
                center: 'title',
                right: 'agendaWeek,agendaDay'
              },
              defaultView: 'agendaWeek',
              buttonText: {
                today: 'Hoje',
                month: 'Mês',
                week: 'Semana',
                day: 'Dia'
              },
              //Random default events
              events: eventosCal,
              editable: false,
              droppable: false,
            });

          }
      });

      // Renderiza o calendário ao trocar de aba
      $(document).ready(function () {
          $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
              $('#calendar').fullCalendar('render');
          });
          $('#calendario a:first').tab('show');
      });

    });
</script>
<script>
  //$(".textarea").wysihtml5();
</script>
@endsection