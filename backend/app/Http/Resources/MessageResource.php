<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource
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
            'message' => $this->message,
            'sender' => $this->sender_id === auth()->user()->id,
            'senderImage' => getProfileImagePath($this->sender->profile_image, $this->sender->name),
            'senderName' => $this->sender->name,
            'receiverImage' => getProfileImagePath($this->receiver->profile_image, $this->receiver->name),
            'receiverName' => $this->receiver->name,
            'time' => $this->created_at->format('h:i A | M d'),
        ];
    }
}
