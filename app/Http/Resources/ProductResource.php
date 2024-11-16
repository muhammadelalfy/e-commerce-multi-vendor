<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'slug' => $this->slug,
            'relations' => [
                'category' => $this->category->only(['id', 'name']),
                'store' => $this->store->only(['id', 'name']),
            ],
            'price' => $this->price,
            'compare_price' => $this->compare_price,
        ];
    }
}
