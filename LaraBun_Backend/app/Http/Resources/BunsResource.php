<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BunsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
      return [
        'id' => $this->id,
        'name' => $this->name,
        'desc' => $this->desc,
        'picture' => $this->picture,
        'items' => $this->items,
        'user' => $this->user,
        'ratings' => $this->ratings,
        'average_rating' => $this->ratings->avg('rating'),
        // Casting objects to string, to avoid receive create_at and update_at as object
        'created_at' => (string) $this->created_at,
        'updated_at' => (string) $this->updated_at
      ];
    }
}
