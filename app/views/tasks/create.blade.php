@extends('_base')

@section('content')
{{ Form::open(['route' => 'tasks.store']) }}

	@include('tasks._form')

{{ Form::close() }}
@stop