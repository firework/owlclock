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
	{{ Form::label('price', 'Preço') }}
	{{ Form::text('price') }}
</div>

<div>
	{{ Form::label('github', 'Github') }}
	{{ Form::text('github') }}
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

{{ Form::submit() }}