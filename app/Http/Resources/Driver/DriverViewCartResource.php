<?php

namespace App\Http\Resources\Driver;

use App\Food;
use App\User;
use Illuminate\Http\Resources\Json\JsonResource;

class DriverViewCartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'food' => Food::find($this->food_id)->name,
            'customer' => User::find($this->user_id)->firstName.' '.User::find($this->user_id)->lastName,
            'long' => User::find($this->user_id)->long,
            'lat' => User::find($this->user_id)->lat
        ];
    }
}
