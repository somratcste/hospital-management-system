<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ecategory extends Model
{
    public function employee()
    {
    	return $this->hasMany('App\Employee');
    }
}
