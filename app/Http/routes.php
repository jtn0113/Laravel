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

Route::get('/', 'HomeController@showWelcome');

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