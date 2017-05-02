<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Log;

class PostsController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index(Request $request)
    {
        if(isset($request->search)) {
            $posts = Post::with('user')->where('title', 'like', "%$request->search%")->orWhere('content', 'like', "%$request->search%")->orderBy('created_at', 'DESC')->paginate(10);
        } elseif ($request->name) {
            $posts = Post::join('users', 'created_by', '=', 'users.id')
                    ->where('name', 'like', "%$request->name%")
                    ->orderBy('posts.created_at', 'DESC')
                    ->paginate(10);
        } else {
            $posts = Post::with('user')->orderBy('posts.created_at', 'DESC')->paginate(10);
        }

        return view('posts.index')->with('posts', $posts);
    }

    public function create(Request $request)
    {        
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, Post::$rules);

                // name is not empty
        $post = new Post();
        $post->title = $request->title;
        $post->url = $request->url;
        $post->content = $request->content;
        $post->created_by = \Auth::user()->id;
        $post->save();

        $request->session()->flash('successMessage', 'Post created successfully');
    
        return redirect('posts');
    }

    public function show(Request $request, $id)
    {
        // find or fail does the same as the following commented out code!!
        $post = Post::findOrFail($id);
        // if ($post === null){
        //     abort(404);
        //     $request->session()->flash('errorMessage', 'This post does not exist');
        //     Log::info("Post $id was not found");
        //    return redirect()->action('PostsController@index');
        // }else{
            return view('posts.show')->with('post', $post);
        // }
    }

    public function edit(Request $request, $id)
    {
        $post = Post::find($id);

        if ($post === null){
            abort(404);
            // $request->session()->flash('errorMessage', 'This post does not exist');
            Log::info("Post $id was not found");
           return redirect()->action('PostsController@index');
        }

        return view('posts.edit')->with('post', $post);
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        if ($post === null){
            abort(404);
            // $request->session()->flash('errorMessage', 'This post does not exist');
            Log::info("Post $id was not found");
           return redirect()->action('PostsController@index');
        }

        $this->validate($request, Post::$rules);
        $post->title = $request->title;
        $post->url = $request->url;
        $post->content = $request->content;
        $post->created_by = 1;
        $post->save();
        return redirect()->action('PostsController@index');
    }

    public function destroy(Request $request, $id)
    {
        if ($post === null){
            abort(404);
            // $request->session()->flash('errorMessage', 'This post does not exist');
            Log::info("Post $id was not found");
           return redirect()->action('PostsController@index');
        }
        return 'This should remove a post';
    }
}