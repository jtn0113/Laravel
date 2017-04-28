<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    public static $rules = array(
        'title' => 'required|max:100',
        'url'   => 'required|url',
        'content' => 'required'
    );

}