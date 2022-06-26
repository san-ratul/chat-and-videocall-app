<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email,
            'image' => !empty($this->profile_image)
                ? asset($this->profile_image)
                : "https://ui-avatars.com/api/?name=".str_replace(' ', '+',trim($this->name))."&size=128&color=fff&background=B23CFD&rounded=true",
        ];
    }
}
