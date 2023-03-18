<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'email' => $this->email,
            'last_name' => $this->last_name,
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'phone_number' => $this->phone_number,
            'email_verified_at' => $this->email_verified_at,
            'created_at' => $this->created_at->format('d-m-Y H:m'),
            'updated_at' => $this->updated_at->format('d-m-Y H:m'),
        ];
    }
}
