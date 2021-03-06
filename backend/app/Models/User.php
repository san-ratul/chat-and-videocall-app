<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_image',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function messages($userId)
    {
        $message = Message::query()->where(function($query) use ($userId) {
            $query->where('sender_id', $this->id)
                ->where('receiver_id', $userId);
        })
            ->orWhere(function($query) use ($userId) {
                $query->where('sender_id', $userId)
                    ->where('receiver_id', $this->id);
            })
            ->orderBy('id', 'desc')
            ->paginate(10);
        return $message;
    }

    /**
     * @param $userId
     * @param $message
     * @return mixed
     */
    public function sendMessage($userId, $message): mixed
    {
        return Message::create([
            'sender_id' => $this->id,
            'receiver_id' => $userId,
            'message' => $message,
        ]);
    }
}
