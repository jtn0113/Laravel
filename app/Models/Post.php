<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends BaseModel
{
    protected $table = 'posts';

    public static $rules = array(
        'title' => 'required|max:100',
        'url'   => 'required|url',
        'content' => 'required'
    );

    public function user()
	{
	    return $this->belongsTo('App\User', 'created_by');
	}
}