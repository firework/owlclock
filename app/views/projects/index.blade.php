@extends('_base')

@section('content')
<table class="table table-bordered table-striped">
	<tr>
		<th>Nome</th>
		<th style="width: 10px;">Add</th>
		<th style="width: 10px;">Git</th>
		<th style="width: 80px;">Início</th>
		<th style="width: 80px;">Fim</th>
		<th style="width: 10px;">Preço</th>
		<th style="width: 130px;"></th>
	</tr>

	@foreach ($projects as $project)
    <tr>
		<td>{{ $project->title }}</td>
		<td>
			<a href="{{ URL::route('projects.tasks.create', $project->id) }}">+Task</a>
		</td>
		@if ($project->github)
			<td><a href="{{ $project->github }}"><img src="{{ URL::asset('img/github_icon.png') }}"></a></td>
		@else
			<td><a href="#"><img src="{{ URL::asset('img/no_github_icon.png') }}"></a></td>
		@endif
		<td>{{ $project->begin }}</td>
		<td>{{ $project->deadline }}</td>
		<td>{{ $project->price }}</td>
		<td>
			<a href="{{ URL::route('projects.show', $project->id) }}">Ver</a> |
			<a href="{{ URL::route('projects.edit', $project->id) }}">Editar</a> |
			<a href="{{ URL::route('projects.delete', $project->id) }}">Deletar</a>
		</td>
	</tr>
	@endforeach

</table>
<a href="{{ URL::route('projects.create') }}">Adicionar Projeto</a>
@stop