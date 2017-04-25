<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ExampleController extends Controller
{
    public function add($one, $two)
    {
        $data = ['one' => $one, 'two' => $two];
        return view('add', $data);
    }
}
