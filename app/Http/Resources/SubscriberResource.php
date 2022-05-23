<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SubscriberResource extends JsonResource
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
            'subscriber_id' => $this->id,
            'subscriber_name' => $this->user->name,
            'subscriber_email' => $this->user->email,
            'website' => $this->website->website_url,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
