<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'blog name' => $this->name,
            'description' => $this->description,
            'image' => $this->image,
            'category name' => new CategoryResource($this->category),


        ];
    }
}
