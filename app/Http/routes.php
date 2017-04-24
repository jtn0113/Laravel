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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/uppercase/{string}', function ($string) {
    return strtoupper($string);
});

Route::get('/increment/{int}', function ($int) {
    	return $int+1;
});

Route::get('/add/{one}{two}', function ($one, $two) {
    	return $one+$two;
});

Route::get('/sayhello/{name?}', function($name = "World")
{
	$data = ['name' => $name];
    return view('my-first-view', $data);
});

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