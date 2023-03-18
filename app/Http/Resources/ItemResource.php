<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class ItemResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'slug' => $this->slug,
            'name' => $this->name,
            'number' => $this->number,
            'description' => $this->description,
            'rating' => $this->rating,
            'quantity' => $this->quantity,
            'price_per_unit' => $this->price_per_unit,
            'discount' => $this->discount,
            'preview_image' => Storage::url($this->preview_image),
            'images' => ImageResource::collection($this->images)
        ];
    }
}
