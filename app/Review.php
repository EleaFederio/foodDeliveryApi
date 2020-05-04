<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function foods(){
        return $this->belongsTo(Food::class);
    }
}
