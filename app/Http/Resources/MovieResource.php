<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MovieResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            // 'id' => $this->id,
            'title' => $this->movie_title,
            'name' => $this->movie_name,
            'director' => $this->movie_director,
            'release_year' => $this->release_year,
            'url'=>$this->watch_url
        ];
    }
}
