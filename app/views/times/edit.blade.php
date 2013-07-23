{{ Form::model($time, ['route' => ['times.update', $time->id], 'id' => 'form-edit-time-tracking', 'method' => 'PUT', 'data-id' => $time->id]) }}
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
		{{ Form::hidden('task_id') }}
    </div>
    <div class="modal-footer">
    	<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    	<button class="btn btn-primary" type="submit">Save</button>
    </div>
{{ Form::close() }}