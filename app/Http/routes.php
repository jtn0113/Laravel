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