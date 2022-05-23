<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [

            'id' => $this->id,
            'post_title' => $this->post_title,
            'post_body' => $this->post_body,
            'website'   => $this->website,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

        ];
    }
}
