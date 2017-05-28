@extends('layouts.master')

@section('content')

	@foreach($films as $film)
		<article class="row">
			<div class="col-md-4 col-md-offset-4 col-xs-12">
			<div class="panel panel-default">
				<div class='panel-heading'>
					<h3>{{ $film->title }}</h3>			
				</div>
				<div class="panel-body">
					<div class="col-xs-6">
						Valoraciones: {{ $film->ratings->count() }}
					</div>

					<?php 
						$userRating = null;
						$average = 0;
				   ?>

					@foreach($film->ratings as $rating)
						<?php $average += $rating->rating; ?>

						@if($rating->user_id == Auth::id())
							<?php $userRating = $rating->rating ?>
						@endif
					@endforeach

					<div class="col-xs-6">

					    Valoración media: {{ $film->ratings->count() ? $average / $film->ratings->count() : 'No hay valoraciones'}}
					</div>

					<div class="col-xs-12">
						Mi valoración: {{ is_null($userRating) ? 'No hay valoración' : $userRating }}  

						@if(is_null($userRating)) 
							{{ HTML::linkaction('RatingsController@create', "", ['film' => $film->id], ["class" => "btn btn-default glyphicon glyphicon-plus", 'title' => 'Añade una valoración'])}}
						@else
							{{ HTML::linkaction('RatingsController@edit', "", $film->id, ["class" => "btn btn-default glyphicon glyphicon-pencil"])}}
						@endif
					</div>
				</div>	
				</div>
			</div>
		</article>
	@endforeach

@stop