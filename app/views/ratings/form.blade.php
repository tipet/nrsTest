<div class="row">
	    <div class="col-md-4 col-md-offset-4 col-xs-12">
		    {{ Form::label('film', 'Película') }}
		    {{ Form::select('films', $films, $film_id, ['class' => 'form-control', 'disabled' => 'disabled']) }}
		    {{ $errors->first('film_id')}}
		    {{ Form::hidden('film_id', $film_id)}}
	    </div>
	</div>

    <div class="row">
	    <div class="col-md-4 col-md-offset-4 col-xs-12">
		    {{ Form::label('rating', 'Valoración') }}
		    {{ Form::text('rating',isset($film_rating) ? $film_rating : '', ['class' => 'form-control', 'placeholder' => 'Introduce una valoración']) }}
		    {{ $errors->first('rating')}}

		</div>
	</div>

    <div class="row">
	    <div class="col-md-4 col-md-offset-4 col-xs-12">
		    {{Form::submit('Enviar', ['class' => 'btn btn-primary pull-right'])}}	
		</div>
	</div>
</div>