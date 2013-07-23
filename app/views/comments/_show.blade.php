<div class="comment well well-small">
	<p>
		<span>User: {{ $comment->user }} </span>
		<span>{{ $comment->text }}</span>
		<a href="{{ URL::route('comments.delete', $comment->id) }}" data-remove=".comment" class="close ajax">&times;</a>
	</p>
</div>