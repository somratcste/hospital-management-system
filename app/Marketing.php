<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marketing extends Model
{
    public function villages()
    {
    	return $this->hasMany('App\Village');
    }
}
