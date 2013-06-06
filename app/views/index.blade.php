@extends('_base')
@section('content')
	@if ($pic)
		<img src="{{ URL::asset('img/owl.jpg') }}">
	@else
		<img src="{{ URL::asset('img/owl2.jpg') }}">
	@endif
	<ul>
		<li><a href="{{ URL::route('projects.index') }}">Projetos</a></li>
		<li><a href="{{ URL::route('tasks.index') }}">Tasks</a></li>
	</ul>
@stop