<?php

namespace App\Http\Resources;

use App\Models\Message;
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
        $userId = (auth()->check()) ? auth()->user()->id : null;
        if(!empty($userId)){
            $message = Message::query()->where(function($query) use ($userId) {
                $query->where('sender_id', $this->id)
                    ->where('receiver_id', $userId);
                })
                ->orWhere(function($query) use ($userId) {
                    $query->where('sender_id', $userId)
                        ->where('receiver_id', $this->id);
                })
                ->orderBy('id', 'desc')->first();
        }
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'image' => !empty($this->profile_image)
                ? asset($this->profile_image)
                : "https://ui-avatars.com/api/?name=".str_replace(' ', '+',trim($this->name))."&size=128&color=fff&background=B23CFD&rounded=true",
            'last_message' => !empty($message)
                ? substr($message->message,0,15) . '...' ??
                  '' :
                '',
            'time' => !empty($message)
                ? $message->created_at->diffForHumans()
                : '',
        ];
    }
}
