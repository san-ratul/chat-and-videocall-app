<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    //create fillable fields for the model
    protected $fillable = [
        'receiver_id', 'sender_id', 'message', 'read'
    ];

    //create a relationship between the model and the user model
    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }
    // create a relationship between the model and the user model
    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }
}
