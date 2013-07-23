<div id="time-{{ $time->id }}" class="time well well-small">
	<p>
		<span>User: </span>
		<span>Time: {{ $time->time }}</span>
		<span>{{ $time->type }}</span>
		<a href="{{ URL::route('times.delete', $time->id) }}" data-remove=".time" class="ajax pull-right" title="Delete"><i class="icon-trash"></i></a>
		<a href="{{ URL::route('times.edit', $time->id) }}" class="edit-time-tracking pull-right" title="Edit"><i class="icon-edit"></i></a>
	</p>
</div>