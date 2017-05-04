@extends('layouts.master')

@section('content')

<table class="table table-striped">
	<tr>
		<th>Score</th>
		<th>title</th>
		<th>url</th>
		<th>content</th>
		<th>Written on</th>
		<th>Posted by</th>
		<div class="dropdown">
		  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
			Sort By
			<span class="caret"></span>
		  </button>
		  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
			<li><a href="{{ action('PostsController@sortNew') }}">Most Recent</a></li>
			<li><a href="{{ action('PostsController@sortRating') }}">Highest Rated</a></li>
			<li><a href="{{ action('PostsController@sortMe') }}">My Posts</a></li>
		  </ul>
		</div>
	</tr>
	@foreach($posts as $post)
	<tr>
		<td>
			{{ $post->score() }} <br> 
			<a href="{{ action('VotesController@up', [$post->id]) }}"><i class="fa fa-toggle-up"></i></a><br>
			<a href="{{ action('VotesController@down', [$post->id]) }}"><i class="fa fa-toggle-down"></i></a> 
		</td>
		<td><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></td>
		<td>{{ $post->url }}</td>
		<td>{{ $post->content }}</td>
		<td>{{ $post->created_at->setTimezone('America/Chicago')->format('l, F jS Y @ h:i:s A') }}</td>
		<td> {{ $post->user->name }} </td>
	</tr>
	@endforeach
</table>

{!! $posts->render() !!}

@stop

