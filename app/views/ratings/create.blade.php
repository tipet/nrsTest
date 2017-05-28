@extends('layouts.master')

@section('content')

    {{ Form::open(['action' => 'RatingsController@store']) }}

    	@include('ratings.form')
    
    {{ Form::close() }}

@stop