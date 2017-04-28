@extends('layouts.master')

@section('content')

<h1>{{ $post->title }}</h1>
<p>{{ $post->url }}</p>
<p>{{ $post->content }}</p>


@stop