@extends('_base')

@section('content')
{{ Form::open(['route' => 'projects.store']) }}

	@include('projects._form')

{{ Form::close() }}
@stop