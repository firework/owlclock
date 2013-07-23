	{{ Form::hidden('project_id', $project->id) }}

@if ($errors)
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
@endif

<div>
	{{ Form::label('title', 'Nome') }}
	{{ Form::text('title') }}
</div>


<div>
	{{ Form::label('parent_id', 'Task') }}
	{{ Form::select('parent_id', $tasks) }}
</div>

<div>
	{{ Form::label('time', 'Tempo') }}
	{{ Form::input('number', 'time', null, ['min' => '0']) }}
</div>

<div>
	{{ Form::label('branch', 'Branch') }}
	{{ Form::text('branch') }}
</div>

<div>
	{{ Form::label('description', 'Descrição') }}
	{{ Form::textarea('description') }}
</div>

<div>
	{{ Form::label('begin', 'Início') }}
	{{ Form::text('begin') }}
</div>

<div>
	{{ Form::label('deadline', 'Prazo') }}
	{{ Form::text('deadline') }}
</div>

<div>
	{{ Form::label('priority', 'Prioridade') }}
	{{ Form::input('number', 'priority') }}
</div>

{{ Form::submit() }}