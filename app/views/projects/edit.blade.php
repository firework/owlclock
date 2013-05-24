@extends('_base')

@section('content')
{{ Form::model($project, ['route' => ['projects.update', $project->id], 'method' => 'PUT']) }}

	@include('projects._form')

{{ Form::close() }}
@stop