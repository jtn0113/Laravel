<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{

    public function index()
    {
        $posts = \App\Models\Post::paginate(3);
        return view('posts.index')->with('posts', $posts);

    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, \App\Models\Post::$rules);

                // name is not empty
        $post = new \App\Models\Post();
        $post->title = $request->title;
        $post->url = $request->url;
        $post->content = $request->content;
        $post->created_by = 1;
        $post->save();
    
        return redirect('posts');
    }

    public function show(Request $request, $id)
    {
        $post = \App\Models\Post::find($id);
        if ($post === null){
            $request->session()->flash('errorMessage', 'This post does not exist');
           return redirect()->action('PostsController@index');
        }else{
            return view('posts.show')->with('post', $post);
        }
    }

    public function edit($id)
    {
        $post = \App\Models\Post::find($id);
        return view('posts.edit')->with('post', $post);
    }

    public function update(Request $request, $id)
    {
        $post = \App\Models\Post::find($id);
        $this->validate($request, \App\Models\Post::$rules);
        $post->title = $request->title;
        $post->url = $request->url;
        $post->content = $request->content;
        $post->created_by = 1;
        $post->save();
        return redirect()->action('PostsController@index');
    }

    public function destroy($id)
    {
        return 'This should remove a post';
    }
}