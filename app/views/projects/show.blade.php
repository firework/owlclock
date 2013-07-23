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

	<a href="{{ URL::route('projects.tasks.create', $project->id) }}">+Task</a>

@if ($tasks)
	<table class="table table-bordered table-striped">
		<tr>
			<th>Nome</th>
			<th style="width: 10px;">Git</th>
			<th style="width: 80px;">Início</th>
			<th style="width: 80px;">Fim</th>
			<th style="width: 10px;">Tempo</th>
			<th style="width: 130px;"></th>
		</tr>

		@foreach ($tasks as $task)
	    <tr>
			<td style="text-indent: {{ $task->indent * 15 }}px">{{ $task->title }}</td>
			@if ($task->branch)
				<td><a href="{{ $task->branch }}"><img src="{{ URL::asset('img/github_icon.png') }}"></a></td>
			@else
				<td><a href="#"><img src="{{ URL::asset('img/no_github_icon.png') }}"></a></td>
			@endif
			<td>{{ $task->begin }}</td>
			<td>{{ $task->deadline }}</td>
			<td style="text-indent: {{ $task->indent * 15 }}px">{{ $task->time }}</td>
			<td>
				<a href="{{ URL::route('projects.tasks.show', [$task->project_id, $task->id]) }}">Ver</a> |
				<a href="{{ URL::route('projects.tasks.edit', [$task->project_id, $task->id]) }}">Editar</a> |
				<a href="{{ URL::route('projects.tasks.delete', [$task->project_id, $task->id]) }}">Deletar</a>
			</td>
		</tr>
		@endforeach

	</table>
@endif

@stop