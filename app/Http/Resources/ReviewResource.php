<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'comment' => $this->comment,
            'advantages' => $this->advantages,
            'disadvantages' => $this->disadvantages,
            'rating' => $this->rating,
            'created_at' => $this->created_at->format('d-m-Y H-m'),
            'customer' => new CustomerResource($this->customer)
        ];
    }
}
