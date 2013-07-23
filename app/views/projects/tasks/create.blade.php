@extends('_base')

@section('content')
{{ Form::open(['route' => ['projects.tasks.store', $project->id]]) }}

	@include('projects.tasks._form')

{{ Form::close() }}
@stop