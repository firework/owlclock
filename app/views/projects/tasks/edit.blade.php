@extends('_base')

@section('content')
{{ Form::model($task, ['route' => ['projects.tasks.update', $project->id, $task->id], 'method' => 'PUT']) }}

	@include('projects.tasks._form')

{{ Form::close() }}
@stop