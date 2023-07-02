<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BannersResource extends JsonResource
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
            'link'=> $this->link,
            'image' => $this->image,
            'gradient_start' => $this->gradient_start,
            'gradient_end' => $this->gradient_end,
            'active' => boolval($this->active),
            'created_at'=> $this->created_at
        ];
    }
}
