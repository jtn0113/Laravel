@extends('layouts.master')

@section('content')

<form method="POST" action="{{ action('UsersController@update', Auth::id() ) }}">
	{!! csrf_field() !!}
	<label for="name">Name</label>
	<input type="text" id="name" name="name" value="{{ $users->name }}">
	<br>
	<label for="email">Email</label>
	<input type="text" id="email" name="email" value="{{ $users->email }}">
	<br>
	<label for="password">Password</label>
	<input type="password" id="password" name="password" value="{{ $users->password }}">
	<br>
	<button type="submit">Save</button>
</form>

@stop