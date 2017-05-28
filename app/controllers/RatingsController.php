<?php

class RatingsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$films = Film::all();

		return View::make('ratings.index')->with(compact('films'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$film_id = $_GET['film'];
		$films = Film::all()->lists('title', 'id');

		return View::make('ratings.create')->with(compact('films', 'film_id'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		$rating = new Rating();

		$rating->fill(Input::all());

		try{
			if ($rating->isValid()) {
				$rating->save();

				$logger = new Katzgrau\KLogger\Logger('.'.'/logs');
				$logger->info('Nueva valoración: ' . $rating->rating);

				return Redirect::action('RatingsController@index');
			}
		} catch(Exception $e) {
			throw $e;
		}

		return Redirect::back()->withErrors($rating->getErrors());

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$rating = Rating::where('film_id', $id)
			->where('user_id', Auth::id())
			->first();

		if(!is_null($rating)) {

			$films = Film::all()->lists('title', 'id');
			$film_id = $rating->film_id;
			$film_rating = $rating->rating;
			
			return View::make('ratings.edit')->with(compact('film_id', 'film_rating', 'films'));
		}	
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rating = Rating::where('film_id', $id)
			->where('user_id', Auth::id())
			->first();

		if (!is_null($rating)) {
			$rating->rating = Input::get('rating');

			if($rating->isValid()) {
				try {
					$rating->save();	
				} catch(Exception $e) {
					throw $e;
				}
			}

			$logger = new Katzgrau\KLogger\Logger('.'.'/logs');
			$logger->info('Valoración actualizada: ' . $rating->rating);

			return Redirect::action('RatingsController@index');
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
