<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Cart;
class Product extends Model
{
    protected $guarded =[];

    public function carts()
    {
        return $this->belongsToMany(Cart::class)->withPivot('qty','total_price');
    }
    public function orders()
    {
        return $this->belongsToMany(Order::class)->withPivot('qty','total_price','shipping_address','phone_number');
    }
    public function profiles(){
        return $this->belongsToMany('App\Profile');
    }
  
}