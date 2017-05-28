@extends('layouts.master')

@section('content')

	{{Form::open(['action' => 'SessionController@store']) }}

	<div class='row'>
		<div class='form-group col-md-4 col-md-offset-4'>
			{{ Form::label('username_label', 'Nombre de usuario') }}
			{{ Form::text('username', '', ['class' => 'form-control', 'placeholder' => 'Nombre de ususario'])}}
		</div>
	</div>

	<div class='row'>
		<div class='form-group  col-md-4 col-md-offset-4'>
			{{ Form::label('password_label', 'Contraseña') }}
			{{ Form::password('password', ['class' => 'form-control'])}}
		</div>
	</div>

	<div class='row'>
		<div class='col-md-4 col-md-offset-4'>
			{{ Form::submit('Login', ['class' => 'btn btn-primary  pull-right'])}}
		</div>
	</div>	

	{{ Form::close() }}
@stop