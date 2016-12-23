<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    public function specialist()
    {
    	return $this->belongsTo('App\Specialist');
    }

    public function patientouts()
    {
    	return $this->hasMany('App\Patientout');
    }

    public function patient()
    {
    	return $this->hasOne('App\Patient');
    }

    public function operation()
    {
        return $this->hasOne('App\Operation');
    }
}
