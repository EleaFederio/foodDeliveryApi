<?php

namespace App\Http\Resources\Food;

use App\Category;
use App\Seller;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class FoodCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'detail' => substr($this->detail, 0, 20).'...',
            'foodPicture' => $this->foodPicture,
            'seller' => Seller::find($this->seller_id)->businessName,
            'category' => Category::find($this->category_id)->name,
            'price' => $this->price,
            'available' => $this->stock,
            'href' => [
                'show_food' => route('foods.show', $this->id)
            ]
        ];
    }
}
