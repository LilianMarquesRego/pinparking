<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Transaction extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'user_id' => $this->user->id,
            'user_name' => $this->user->name,
            'address' => $this->ad->address,
            'created_at' => $this->created_at->toDateTimeString(),
        ];
    }
}
