<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $guarded = [];
    public function profile()
    {
        return $this->belongsTo('App\Profile');
    }
    public function products()
    {
        return $this->hasMany('App\Products');
    }
}