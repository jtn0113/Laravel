<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function showWelcome()
    {
        return redirect()->action('HomeController@sayHello', array('Bob'));
    }


	public function sayHello($name)
	{
	    $data = array('name' => $name);
	    return view('my-first-view', $data);
	}

	public function uppercase($string)
	{
		$data = ['string' => $string];
    	return view('uppercase', $data);
    }

    public function increment($int)
    {
    	$data = ['int' => $int];
    	return view('increment', $data);
    }
}
