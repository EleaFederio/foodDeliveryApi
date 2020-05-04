<?php

namespace App\Http\Resources\Food;

use App\Seller;
use App\Category;
use Illuminate\Http\Resources\Json\JsonResource;

class FoodResource extends JsonResource
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
            'name' => $this->name,
            'detail' => $this->detail,
            'foodPicture' => $this->foodPicture,
            'seller' => Seller::find($this->seller_id)->businessName,
            'href' => [
                'show_seller' => route('seller.show', $this->id)
            ],
            'category' => Category::find($this->category_id)->name,
            'price' => $this->price,
            'available' => $this->stock,

        ];
    }
}
