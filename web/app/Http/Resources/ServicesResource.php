<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServicesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=> $this->id,
            'title'=>$this->title,
            'position'=>$this->position,
            'short_description'=> $this->short_description,
            'description' => $this->description,
            'price' => $this->price,
            'image' => $this->image,
            'active' => boolval($this->active),
            'created_at'=> $this->created_at
        ];
    }
}
