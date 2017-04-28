@extends('layouts.master')

@section('content')

<form method="POST" action="{{ action('PostsController@store') }}">
	{!! csrf_field() !!}
	<label for="title">title</label>
	<input type="text" id="title" name="title">
	@if($errors->has('title'))
	{{ $errors->first('title')}}
	@endif
	<label for="url">url</label>
	<input type="text" id="url" name="url">
	@if($errors->has('url'))
	{{ $errors->first('url')}}
	@endif
	<label for="content">content</label>
	<textarea name="content" id="" cols="30" rows="10"></textarea>
	@if($errors->has('content'))
	{{ $errors->first('content')}}
	@endif
	<button type="submit">Save</button>
</form>
@stop