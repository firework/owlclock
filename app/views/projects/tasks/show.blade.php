@extends('_base')

@section('title')
<div class="page-header">
	<button class="btn btn-large btn-primary pull-right" id="btn-time-tracking" type="button"><i class="icon-time icon-white"></i> Track Time</button>
	<h1>{{ isset($title) ? $title : 'OwlClock' }}</h1>
</div>
@stop

@section('content')

<div>
	<ul class="nav nav-tabs">
	    <li class="active"><a href="#task" data-toggle="tab">Task</a></li>
	    <li><a href="#comments" data-toggle="tab">Comments</a></li>
	    <li><a href="#time-tracking" data-toggle="tab">Time tracking</a></li>
	</ul>

	<div class="tab-content">

   		<div class="tab-pane active" id="task">
      		<p>Title: {{ $task->title }}</p>
			<p>Project: {{ $task->project->title }}</p>
			<p>Time: {{ $task->time }}</p>
			<p>{{ $task->branch }}</p>
			<p>Description: {{ $task->description }}</p>
			<p>Begin: {{ $task->begin }}</p>
			<p>End: {{ $task->deadline }}</p>
    	</div>

    	<div class="tab-pane" id="comments">
       		@foreach ($task->comments as $comment)
				<div class="comment well well-small">
					<p>
						<span>User: {{ $comment->user }} </span>
						<span>{{ $comment->text }}</span>
						<a href="{{ URL::route('comments.delete', $comment->id) }}" data-remove=".comment" class="close ajax">&times;</a>
					</p>
				</div>
			@endforeach
			@include('comments._form')
    	</div>

    	<div class="tab-pane" id="time-tracking">
       		@foreach ($task->times as $time)
				@include('times._show')
       		@endforeach
    	</div>
    </div>

</div>
<br />

<div id="time-tracking-modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	{{ Form::open(['route' => 'times.store', 'id' => 'form-time-tracking']) }}
	<div class="modal-header">
    	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    	<h3 id="myModalLabel">Time tracking MOFUGGAH!!!</h3>
    </div>
    <div class="modal-body">
		<div>
			{{ Form::label('type', 'Tipo:') }}
			{{ Form::text('type') }}
		</div>
		<div>
			{{ Form::label('time', 'Tempo:') }}
			{{ Form::input('number', 'time', null, ['min' => '0']) }}
		</div>
		{{ Form::hidden('user_id', '2') }}
		{{ Form::hidden('task_id', $task->id) }}
    </div>
    <div class="modal-footer">
    	<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    	<button class="btn btn-primary" type="submit">Save</button>
    </div>
	{{ Form::close() }}
</div>

<div id="time-tracking-edit-modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
</div>


@stop

@section('scripts')
	@parent

	<script type="text/javascript">
		$('.container').on('click', '.ajax', function(e) {
			e.preventDefault();

			if (!confirm('Are you sure?')) return;

			var $this = $(this);

			$.get($(this).attr('href'), function(data) {
				if ($this.data('remove') && data == 'success') {
					$this.parents($this.data('remove')).slideUp('fast', function() {
						$(this).remove();
					});
				}
			});
		});

		$('#btn-time-tracking').on('click', function(e) {
			$('#time-tracking-modal').modal('show');
		});

		$('#time-tracking').on('click', '.edit-time-tracking', function(e) {
			e.preventDefault();

			$('#time-tracking-edit-modal').load($(this).attr('href')).modal('show');
		});

		$('#form-time-tracking').on('submit', function(e) {
			e.preventDefault();

			$.post($(this).attr('action'), $(this).serialize(), function(data) {
				if (data != 'error')
				{
					$('#time-tracking').append(data);
					$('#time-tracking-modal').modal('hide');
					$('#form-time-tracking')[0].reset();
				}
			});
		});

		$('#time-tracking-edit-modal').on('submit', '#form-edit-time-tracking', function(e) {
			e.preventDefault();

			var id = $(this).data('id');

			$.ajax({
				url: $(this).attr('action'),
				type: 'PUT',
				data: $(this).serialize(),
				success: function(data) {
					$('#time-'+id).replaceWith(data);
					$('#time-tracking-edit-modal').modal('hide');
				}
			});
			$.post($(this).attr('action'), $(this).serialize(), function(data) {
				if (data != 'error')
				{
					$('#time-tracking').append(data);
					$('#time-tracking-modal').modal('hide');
					$('#form-time-tracking')[0].reset();
				}
			});
		});

		$('#myTab a').click(function (e) {
		    e.preventDefault();
		    $(this).tab('show');
		});


		$('#form-comments').on('submit', function(e) {
			e.preventDefault();

			$.post($(this).attr('action'), $(this).serialize(), function(data) {
				if (data != 'error')
				{
					$('#form-comments').before(data);
					$('#form-comments')[0].reset();
				}
			});
		});

		$('#myTab a').click(function (e) {
		    e.preventDefault();
		    $(this).tab('show');
		});

	</script>
@stop