<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    
    protected $fillable = [
        'user_id', 'store_intro', 'store_name', 'shop_image', 'access', 'access_station'
    ];

    public function user(){
      return $this->belongsTo(\App\User::class,'user_id');
    }

}
