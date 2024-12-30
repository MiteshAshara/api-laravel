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
        // return parent::toArray($request);
        return [
            // 'id'=> $this->id,
            'name'=> $this->name,
            'price'=> $this->price,
            'description'=> $this->description,
            'created_at'=> $this->create_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
