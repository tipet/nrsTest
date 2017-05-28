<?php

class SessionController extends BaseController {

	public function create() 
	{
		// $user = new User();
		// $user->name = 'pepe';
		// $user->surname = 'paco';
		// $user->username = 'pepe1';
		// $user->password = Hash::make('paco');

		// $user->save();

		return View::make('sessions.create');
	}

	public function destroy() 
	{
		Auth::logout();

		return Redirect::action('SessionController@create');
	}

	public function store()
	{
		if (Auth::attempt(Input::only('username', 'password'))) {

			return Redirect::action('RatingsController@index');
		}

		return Redirect::action('SessionController@create')->with;
	}
}