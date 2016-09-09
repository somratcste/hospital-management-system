<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    public function patient()
    {
    	return $this->hasOne('App\Patient');
    }
}
