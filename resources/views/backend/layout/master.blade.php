<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>UFBAcontece | Administração</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('plugins/ionicons/ionicons.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="{{ action('BackendController@index') }}" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>U</b>FBA</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>UFBA</b>contece</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Habilitar Navegação</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Eventos pendentes -->
              <li class="dropdown tasks-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-flag-o"></i>
                  <span class="label label-danger">9</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">Existem 9 eventos pendentes</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                            Evento x
                            <small class="pull-right">20%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">20% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                    </ul>
                  </li>
                  <li class="footer">
                    <a href="#">Ver todos os eventos</a>
                  </li>
                </ul>
              </li>
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  @if(!empty(Auth::user()->foto))
                    <img src="{{ asset('uploadsDoUsuario/perfil/')}}/{{Auth::user()->foto}}" class="user-image" alt="Foto do Perfil">
                  @else
                    <img src="{{ asset('dist/img/usuario.jpg') }}" class="user-image" alt="Foto do Perfil">
                  @endif

                  <span class="hidden-xs">{{ Auth::user()->nome }}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="{{ asset('dist/img/usuario.jpg') }}" class="img-circle" alt="User Image">
                    <p>
                      {{ Auth::user()->nome }}
                      @if(Auth::user()->isAdmin())
                        <small>Administrador do UFBAcontece</small>
                      @endif
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Perfil</a>
                    </div>
                    <div class="pull-right">
                      <a href="{{ action('Backend\Auth\AuthController@getLogout') }}" class="btn btn-default btn-flat">Sair</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>

      <!-- =============================================== -->

      <!-- Left side column. contains the sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              @if(!empty(Auth::user()->foto))
                <img src="{{ asset('uploadsDoUsuario/perfil/')}}/{{Auth::user()->foto}}" class="img-circle" alt="Foto do Perfil">
              @else
                <img src="{{ asset('dist/img/usuario.jpg') }}" class="img-circle" alt="Foto do Perfil">
              @endif
            </div>

            <div class="pull-left info">
              <p>{{ Auth::user()->nome }}</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MENU</li>
            <li class="treeview">
              <a href="{{ action('BackendController@index') }}">
                <i class="fa fa-dashboard"></i> <span>Painel inicial</span>
              </a>
            </li>
            @if(Auth::user()->isAdmin())
            <li class="header">Menu do Administrador</li>
            <li class="treeview">
              <a href="{{ action('Backend\EventosController@index') }}">
                <i class="fa fa-calendar"></i> <span>Eventos</span>
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Configurações Básicas</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ action('Backend\DepartamentosController@index') }}"><i class="fa fa-table"></i> Departamentos</a></li>
                <li><a href="{{ action('Backend\CategoriasController@index') }}"><i class="fa fa-table"></i> Categorias</a></li>
              </ul>
            </li>
            @endif
        </section>
        <!-- /.sidebar -->
      </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
              @yield('conteudo')
            </div>

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Versão</b> {{ env('VERSAO', '1.0') }}
        </div>
        <strong>Copyright &copy; 2015 <a href="http://assemany.com">UFBAcontece</a>.</strong> Todos os direitos reservados.
      </footer>

    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="{{ asset('plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- SlimScroll -->
    <script src="{{ asset('plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('plugins/fastclick/fastclick.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/app.min.js') }}"></script>

    @yield('scriptsExtra')

  </body>
</html>
