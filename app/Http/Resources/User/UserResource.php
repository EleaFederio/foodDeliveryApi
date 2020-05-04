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
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'middleName' => $this->middleName,
            'profilePicture' => $this->profilePicture,
            'email' => $this->email,
            'address' => $this->address,
            'dateOfBirth' => $this->dateOfBirth,
            'long' => $this->long,
            'lat' => $this->lat,
        ];
    }
}
