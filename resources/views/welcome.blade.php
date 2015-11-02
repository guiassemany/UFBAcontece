<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="Guilherme Assemany">

	<title>UFBAcontece</title>

	<link rel="shortcut icon" href="{{ asset('landing/images/gt_favicon.png') }}">

	<!-- Bootstrap itself -->
	<link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
	<!-- Icons -->
	<link href="{{asset('plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
	<!-- Fonts -->
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<!-- Custom styles -->
	<link rel="stylesheet" href="{{ asset('landing/css/styles.css') }}">

	<!--[if lt IE 9]> <script src="assets/js/html5shiv.js"></script> <![endif]-->
</head>

<body>

<!-- Header -->
<header class="header">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-lg-push-2 text-center">
				<h1>UFBAcontece</h1>
				<h2>A agenda de eventos da UFBA</h2>
				<p class="lead">
					Fique por dentro de tudo que acontece na UFBA! Faça seu cadastro no UFBAcontece!
				</p>
					<br>
					<a href="{{ action('BackendController@index') }}" class="btn btn-lg btn-default">Login/Cadastro</a>
          <br>
          <br>
          <br>
				<p class="small text-muted">Desenvolvido por Guilherme Assemany, Edmilson Lima, Francisleide Almeida, Monira Silva , Suzanne Loures.</p>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div id="illustration">
					<img src="{{ asset('landing/images/ufbacontece-screenshot.png') }}" alt="" >
				</div>
			</div>
		</div>
	</div>
</header>
<!-- /Header -->


<!-- Content -->
<main class="content">

	<!-- Lead -->
	<section class="container space-before space-after">
		<div class="row">
			<div class="col-sm-10 col-sm-push-1">
				<h1 class="text-center">UFBAcontece</h1>
				<p class="lead text-center">

				</p>
			</div>
		</div>
	</section>
	<!-- /Lead -->



	<!-- Features -->
	<section class="container space-before">
		<div class="row featurelist space-after">
			<div class="col-md-5 col-sm-6 col-md-push-1 col-sm-6">
				<img class="img-feature img-responsive" src="{{ asset('landing/images/screen3.png') }}" alt="Sample image">
			</div>
			<div class="col-md-5 col-md-push-1 col-sm-6">
				<h2 class="space-before">Agenda de eventos da UFBA</span></h2>
				<p>Fique por dentro de todos os eventos da UFBA e Informe aos outros estudantes e professores sobre seus eventos!</p>
			</div>
		</div>
	</section>
	<!-- /Features -->

</main>


<footer id="footer" class="jumbotron">
	<section class="container">
		<div class="row">
				<div class="col-md-5 col-md-push-1">
					<h2>Gostou da ideia?</h2>
					<p>Compartilhe com seus amigos o UFBAcontece!</p>
					<!-- AddThis Button BEGIN -->
					<div class="addthis_toolbox addthis_default_style addthis_32x32_style">
					<a class="addthis_button_facebook"></a>
					</div>
					<script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
					<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-536ba34f3dab1f93"></script>
					<!-- AddThis Button END -->

				</div>
				<div class="col-md-5 col-md-push-1">
					<h2>Precisa de ajuda?</h2>
					<p>Veja o nosso repositório do github para instruções de como usar. <a href="https://github.com/guiassemany/UFBAcontece">GitHub</a> </p>
				</div>
		</div>
	</section>
</footer>

<p class="small text-muted text-center">Copyright &copy; 2015, UFBAcontece.</p>
<br>



<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
<script src="{{asset('plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
<script src="{{ asset('landing/js/template.js')}}"></script>

</body>
</html>
