<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    public function seat()
    {
    	return $this->belongsTo('App\Seat');
    }

    public function employee()
    {
    	return $this->belongsTo('App\Employee');
    }
}
