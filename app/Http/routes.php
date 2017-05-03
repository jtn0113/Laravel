<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/users/{id}', 'UsersController@show');

Route::get('/users/{id}/edit', 'UsersController@edit');

Route::post('/users/{id}', 'UsersController@update');

Route::get('/votes/up/{post_id}', 'VotesController@up');

Route::get('/votes/down/{post_id}', 'VotesController@down');

Route::get('/', 'PostsController@index');

Route::get('/sortNew', 'PostsController@sortNew');

Route::get('/sortRating', 'PostsController@sortRating');

Route::get('/uppercase/{string}', 'HomeController@uppercase');

Route::get('/increment/{int}', 'HomeController@increment');

Route::get('/add/{one}/{two}', 'ExampleController@add');

Route::get('/sayhello/{name}', 'HomeController@sayHello');

Route::get('/rolldice/{guess}', function($guess)
{
	$roll = rand(1, 6);
	$result;
	if($roll == $guess) {
		$result = "You win!";
	} else {
		$result = "You lose!";
	}
	$data = ['guess' => $guess, 'roll' => $roll, 'result' => $result];
    return view('roll-dice', $data);
});

Route::resource('posts', 'PostsController');
Route::resource('users', 'UsersController');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');