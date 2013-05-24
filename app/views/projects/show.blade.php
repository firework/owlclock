@extends('_base')

@section('content')
<div>
	<p>{{ $project->title }}</p>
	<p>Price: {{ $project->price }}</p>
	<p>{{ $project->time }}</p>
	<p>{{ $project->github }}</p>
	<p>{{ $project->description }}</p>
	<p>{{ $project->begin }}</p>
	<p>{{ $project->deadline }}</p>
</div>
@stop