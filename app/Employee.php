<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function patient()
    {
    	return $this->hasOne('App\Patient');
    }

    public function ecategory()
    {
    	return $this->belongsTo('App\Ecategory');
    }
}