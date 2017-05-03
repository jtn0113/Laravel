<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vote extends BaseModel
{
    protected $table = 'votes';

    public static $rules = array(
        'user_id' => 'required|integer',
        'post_id'   => 'required|integer',
        'vote' => 'required|integer'
    );
}