<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource 
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
            'id' => $this->id,
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'middleName' => $this->middleName,
            'profilePicture' => $this->profilePicture,
            'phoneNumber' => $this->phoneNumber,
            'email' => $this->email,
            'address' => $this->address,
            'dateOfBirth' => $this->dateOfBirth,
            'long' => $this->long,
            'lat' => $this->lat,
        ];
    }
}
