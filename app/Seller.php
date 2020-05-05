<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Seller extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $guarded = [
        'description'
    ];

    protected $fillable = [
        'firstName', 'lastName', 'phoneNumber', 'password', 'businessName',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

}
