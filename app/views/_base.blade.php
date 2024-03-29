<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>OwlClock</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">

		@section('styles')

			<link href="{{ URL::asset('css/bootstrap.css') }}" rel="stylesheet">
			<style>
				body {
					padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
				}

				.modal > form {
					margin-bottom: 0;
				}
			</style>
			<link href="{{ URL::asset('css/bootstrap-responsive.css') }}" rel="stylesheet">

			<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
			<!--[if lt IE 9]>
				<script src="{{ URL::asset('js/html5shiv.js') }}"></script>
			<![endif]-->
		@show

	</head>

	<body>

		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container">
					<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="brand" href="#">OwlClock</a>
					<div class="nav-collapse collapse">
						<ul class="nav">
							<li><a href="{{ URL::to('/') }}">Página Inicial</a></li>
							<li><a href="{{ URL::route('projects.index') }}">Projects</a></li>
							<!-- <li><a href="[[ URL::route('states.index') ]]">Estados</a></li> -->
						</ul>
					</div>
				</div>
			</div>
		</div>

		<div class="container">

			@section('title')
			<div class="page-header">
				<h1>{{ isset($title) ? $title : 'OwlClock' }}</h1>
			</div>
			@show

			@section('content')
				<p>Conteúdo não encontrado.</p>
			@show

		</div>

		@section('scripts')
			<script src="{{ URL::asset('js/jquery.min.js') }}"></script>
			<script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
		@show

	</body>
</html>
