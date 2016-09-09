<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    public function seat()
    {
    	return $this->belongsTo('App\Seat' );
    }
}
