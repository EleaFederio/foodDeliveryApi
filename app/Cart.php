<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function drivers(){
        return $this->belongsTo(Driver::class);
    }
}
