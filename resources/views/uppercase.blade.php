@extends('layouts.master')

@section('uppercase')
    <h1>{!! $string !!}<br> {!! strtoupper($string) !!}</h1>
@stop