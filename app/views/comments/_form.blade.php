{{ Form::open(['route' => ['projects.tasks.comments.store', $task->project_id, $task->id], 'id' => 'form-comments']) }}

	@if ($errors)
		<ul>
			@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	@endif

	<div>
		{{ Form::label('text', 'Comentário') }}
		{{ Form::textarea('text', null, ['class' => 'span12']) }}
	</div>

	<div>
		<input type='hidden' name='user_id' value='$user->id'>
	</div>
	{{ Form::submit() }}

{{ Form::close() }}