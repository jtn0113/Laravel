<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class VotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function up($post_id)
    {
        $vote = new \App\Models\Vote;
        $vote->vote = 1;
        $vote->user_id = \Auth::user()->id;
        $vote->post_id = $post_id;
        $vote->save();
        return redirect('posts');
    }

    public function down($post_id)
    {
        $vote = new \App\Models\Vote;
        $vote->vote = -1; 
        $vote->user_id = \Auth::user()->id; 
        $vote->post_id = $post_id;
        $vote->save();
        return redirect('posts');
    }

}
