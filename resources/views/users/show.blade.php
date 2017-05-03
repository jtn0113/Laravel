@extends('layouts.master')

@section('content')

<table class="table table-striped">
    <form method="POST" action="{{ action('Auth\AuthController@postRegister')}}">
        {!! csrf_field() !!}

        <tr>
            <th>Name</th>
            <th>Email</th>
        </tr>

        <tr>
            <td>{{ $users->name }}</td>
            <td>{{ $users->email }}</td>
        </tr>
    </form>
</table>

@if(Auth::id() == $users->id)
<a href="/users/{{$users->id}}/edit"><button>Edit your info</button></a>
@endif

@stop