@extends('_base')

@section('content')
<div>
	<p>Title: {{ $task->title }}</p>
	<p>Project: {{ $task->project->title }}</p>
	<p>Time: {{ $task->time }}</p>
	<p>{{ $task->branch }}</p>
	<p>Description: {{ $task->description }}</p>
	<p>Begin: {{ $task->begin }}</p>
	<p>End: {{ $task->deadline }}</p>
</div>
@stop