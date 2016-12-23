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

    public function invoice()
    {
    	return $this->hasOne('App\Invoice');
    }

    public function doctor()
    {
        return $this->belongsTo('App\Doctor');
    }

    public function report()
    {
        return $this->hasOne('App\Report');
    }

    public function operation()
    {
        return $this->hasOne('App\Operation');
    }
}
