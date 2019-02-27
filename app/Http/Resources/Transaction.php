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
            'user' => $this->user,
            'ad' => $this->ad,
            'created_at' => $this->created_at->toDateTimeString(),
        ];
    }
}
