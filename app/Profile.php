<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::created(function($profile){
            $profile->cart()->create();
        });
        static::deleted(function($profile){
            $profile->cart()->delete();
        });
    }


    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function cart()
    {
        return $this->hasOne('App\Cart');
    }
}