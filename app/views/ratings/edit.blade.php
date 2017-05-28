@extends('layouts.master')

@section('content')

    {{ Form::open(['action' => ['RatingsController@update', 'id' => $film_id], 'method' => 'PUT']) }}

    	@include('ratings.form')
    
    {{ Form::close() }}

@stop