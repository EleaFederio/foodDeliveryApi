<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    public function reviews(){
        return $this->hasMany(Review::class);
    }
}
