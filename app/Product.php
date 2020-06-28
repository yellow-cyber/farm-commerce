<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Cart;
class Product extends Model
{
    protected $guarded =[];

    public function carts()
    {
        return $this->belongsToMany(Cart::class);
    }
    public function profiles(){
        return $this->belongsToMany('App\Profile');
    }
}