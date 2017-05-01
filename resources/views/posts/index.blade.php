@extends('layouts.master')

@section('content')

<table class="table table-striped">
	<tr>
		<th>title</th>
		<th>url</th>
		<th>content</th>
		<th>Written on</th>
		<th>Posted by</th>
	</tr>
	@foreach($posts as $post)
	<tr>
		<td>{{ $post->title }}</td>
		<td>{{ $post->url }}</td>
		<td>{{ $post->content }}</td>
		<td>{{ $post->created_at->setTimezone('America/Chicago')->format('l, F jS Y @ h:i:s A') }}</td>
		<td> {{ $post->user->name }} </td>
	</tr>
	@endforeach
</table>

{!! $posts->render() !!}

@stop

