<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['food_id', 'user_id', 'quantity'];

    public function drivers(){
        return $this->belongsTo(Driver::class);
    }

    public  function  users(){
        return $this->belongsTo(User::class);
    }
}
