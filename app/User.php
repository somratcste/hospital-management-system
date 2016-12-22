<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function invoiceout()
    {
        return $this->hasMany('App\InvoiceOut');
    }

    public function report()
    {
        return $this->hasMany('App\Report');
    }

    public function outdoorIncome()
    {
        return $this->hasMany('App\OutdoorIncome');
    }
}
