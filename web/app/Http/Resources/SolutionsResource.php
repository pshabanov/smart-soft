<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SolutionsResource extends JsonResource
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
            'description' => $this->description,
            'solution' => $this->solution,
            'image' => $this->image,
            'active' => boolval($this->active),
            'created_at'=> $this->created_at
        ];
    }
}
