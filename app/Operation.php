<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    public function operationType()
    {
    	return $this->belongsTo('App\OperationType');
    }

    public function doctor()
    {
    	return $this->belongsTo('App\Doctor');
    }

    public function patient()
    {
    	return $this->belongsTo('App\Patient');
    }
}
