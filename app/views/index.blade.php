@extends('_base')
@section('content')
	<img src="{{ URL::asset('img/owl.jpg') }}">
	<ul>
		<li><a href="{{ URL::route('projects.index') }}">Projetos</a></li>
		<li><a href="{{ URL::route('tasks.index') }}">Tasks</a></li>
	</ul>
@stop