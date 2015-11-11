@extends('backend.layout.master')

@section('conteudo')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Perfil
    <small>{{$usuario->nome}}</small>
  </h1>
  <ol class="breadcrumb">
    <li class=""><a href="#"><i class="fa fa-dashboard"></i> Início</a></li>
    <li class=""><a href="#"><i class="fa fa-user"></i> perfil</a></li>
    <li class="active"><a href="#"><i class="fa fa-user"></i> {{$usuario->nome}}</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

          <div class="row">
            <div class="col-md-3">

              <!-- Profile Image -->
              <div class="box box-primary">
                <div class="box-body box-profile">
                  @if(!empty($usuario->foto))
                    <img class="profile-user-img img-responsive img-circle" src="{{ asset('uploadsDoUsuario/perfil/')}}/{{$usuario->foto}}" alt="Foto do perfil">
                  @else
                    <img class="profile-user-img img-responsive img-circle" src="{{ asset('dist/img/usuario.jpg') }}" alt="Foto do perfil">
                  @endif
                  <h3 class="profile-username text-center">{{ $usuario->nome }}</h3>
                  <p class="text-muted text-center">{{ $usuario->email }}</p>

                  <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                      <b>Eventos Publicados</b> <a class="pull-right">{{count($usuario->eventos)}}</a>
                    </li>
                  </ul>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
            <div class="col-md-9">
            <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Sobre {{$usuario->nome}}</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <strong><i class="fa fa-book margin-r-5"></i>  Curso</strong>
                  <p class="text-muted">
                    {{ $usuario->curso->titulo }}
                  </p>

                  <hr>

                  <strong><i class="fa fa-map-marker margin-r-5"></i> Campi</strong>
                  <p class="text-muted">{{ $usuario->unidade->titulo }}</p>

                  <hr>

                  <strong><i class="fa fa-file-text-o margin-r-5"></i> Apresentação</strong>
                  <p>{{ $usuario->apresentacao }}</p>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section>
@endsection
