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
}
