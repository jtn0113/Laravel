<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends BaseModel
{
    protected $table = 'posts';

    public static $rules = array(
        'title' => 'required|max:100',
        'url'   => 'required|url',
        'content' => 'required',
    );

    public function votes()
    {
        return $this->hasMany('App\Models\Vote');
    }

    public function upVotes()
    {
        return $this->votes()->where('vote', '=', '1')->get(); 
    }

    public function downVotes()
    {
        return $this->votes()->where('vote', '=', '-1')->get(); 
    }

    public function score()
    {
        return $this->upVotes()->count()-$this->downVotes()->count();
    }

    public function user()
	{
	    return $this->belongsTo('App\User', 'created_by');
	}
}