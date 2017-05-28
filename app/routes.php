<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return Redirect::action('SessionController@create');
});

Route::get('login', 'SessionController@create');
Route::get('logout', 'SessionController@destroy');
Route::post('store', 'SessionController@store');

Route::group(array('before' => 'auth'), function()
{
	Route::resource('ratings', 'RatingsController');
});