<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MessageResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MessageController extends Controller
{
    public function getMessages(User $user)
    {
        $messages = auth()->user()->messages($user->id)->sortBy('id');
        return response()->json(MessageResource::collection($messages), Response::HTTP_ACCEPTED);
    }
}
