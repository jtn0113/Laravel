<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Hash;

class BaseModel extends Model {
		public function getCreatedAtAttribute($value) {
    	$utc = Carbon::createFromFormat($this->getDateFormat(), $value);
    	return $utc->setTimezone('America/Chicago');
    }

    public function setPasswordAttribute($value) {
    	$this->attributes['password'] = Hash::make($value);
    }
}
