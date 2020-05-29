<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    
    protected $fillable = [
        'user_id', 'restaurant_name', 'restaurant_intro_short', 'restaurant_intro_long', 'restaurant_image', 'restaurant_address', 'access_line', 'access_station', 'restaurant_access_walk', 'restaurant_tell', 'restaurant_opentime', 'restaurant_holiday', 'restaurant_budget', 'restaurant_budget_lunch', 'restaurant_credit_card', 'restaurant_e_money', 'restaurant_url'
    ];

    public function user(){
      return $this->belongsTo(\App\User::class,'user_id');
    }

}
