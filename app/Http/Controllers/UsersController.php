<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function show($id)
    {
        $users = User::findOrFail($id);
        return view('users.show')->with('users', $users);
    }

    public function edit($id)
    {
        if (\Auth::id() !== $id) {
            return redirect()->action('PostsController@index');
        }
        
        $users = User::findOrFail($id);
        return view('users.edit')->with('users', $users);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if ($user === null){
            abort(404);
            // $request->session()->flash('errorMessage', 'This post does not exist');
            Log::info("User $id was not found");
           return redirect()->action('PostsController@index');
        }

        $this->validate($request, User::$rules);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        return redirect()->action('PostsController@index');        
    }
}
