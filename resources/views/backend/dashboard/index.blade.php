@extends('backend.layout.master')

@section('cssExtra')
<!-- fullCalendar 2.2.5-->
<link rel="stylesheet" href="{{ asset('plugins/fullcalendar/fullcalendar.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/fullcalendar/fullcalendar.print.css') }}" media="print">
@endsection

@section('conteudo')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Página Inicial
    <small>UFBAcontece</small>
  </h1>
  <ol class="breadcrumb">
    <li class="active"><a href="#"><i class="fa fa-dashboard"></i> Início</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

          <div class="row">
            <div class="col-md-3">

              <!-- Profile Image -->
              <div class="box box-primary">
                <div class="box-body box-profile">
                  @if(!empty(Auth::user()->foto))
                    <img class="profile-user-img img-responsive img-circle" src="{{ asset('uploadsDoUsuario/perfil/')}}/{{Auth::user()->foto}}" alt="Foto do perfil">
                  @else
                    <img class="profile-user-img img-responsive img-circle" src="{{ asset('dist/img/usuario.jpg') }}" alt="Foto do perfil">
                  @endif
                  <h3 class="profile-username text-center">{{ Auth::user()->nome }}</h3>
                  <p class="text-muted text-center">{{ Auth::user()->email }}</p>

                  <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                      <b>Eventos Publicados</b> <a class="pull-right">{{count(Auth::user()->eventos)}}</a>
                    </li>
                  </ul>

                  <a href="#" class="btn btn-primary btn-block"><b>Publicar Evento</b></a>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

              <!-- About Me Box -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Sobre mim</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <strong><i class="fa fa-book margin-r-5"></i>  Curso</strong>
                  <p class="text-muted">
                    {{ Auth::user()->curso->titulo }}
                  </p>

                  <hr>

                  <strong><i class="fa fa-map-marker margin-r-5"></i> Campi</strong>
                  <p class="text-muted">{{ Auth::user()->unidade->titulo }}</p>

                  <hr>

                  <strong><i class="fa fa-file-text-o margin-r-5"></i> Apresentação</strong>
                  <p>{{ Auth::user()->apresentacao }}</p>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
            <div class="col-md-9">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="{{ session('aba') == 'eventos' || empty(session('aba')) ? 'active' : '' }}">
                    <a href="#activity" data-toggle="tab" aria-expanded="true">Eventos</a>
                  </li>
                  <li class="{{ session('aba') == 'calendario' ? 'active' : '' }}">
                    <a id="linkCalendario" href="#calendario" data-toggle="tab" aria-expanded="false">Calendário</a>
                  </li>
                  <li class="{{ session('aba') == 'settings' ? 'active' : '' }}">
                    <a href="#settings" data-toggle="tab" aria-expanded="false">Perfil</a>
                  </li>
                </ul>
                <div class="tab-content">

                  @include('backend.dashboard.eventos')

                  @include('backend.dashboard.calendario')

                  @include('backend.dashboard.perfil')

                </div><!-- /.tab-content -->
              </div><!-- /.nav-tabs-custom -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section>
@endsection

@section('scriptsExtra')
<!-- fullCalendar 2.2.5 -->
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('plugins/fullcalendar/fullcalendar.min.js') }}"></script>
<script src="{{ asset('plugins/fullcalendar/lang/pt-br.js') }}"></script>

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
     url: "painel/eventosCalendario/",
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
            right: 'month,agendaWeek,agendaDay'
          },
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
@endsection
