@extends('_base')

@section('content')
{{ Form::model($task, ['route' => ['tasks.update', $task->id], 'method' => 'PUT']) }}

	@include('tasks._form')

{{ Form::close() }}
@stop