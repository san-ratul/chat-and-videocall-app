<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MessageResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MessageController extends Controller
{
    /**
     * @param User $user
     * @return JsonResponse
     */
    public function getMessages(User $user): JsonResponse
    {
        $messages = auth()->user()->messages($user->id)->sortBy('id');
        return response()->json(MessageResource::collection($messages), Response::HTTP_ACCEPTED);
    }

    /**
     * @param User $user
     * @param Request $request
     * @return JsonResponse
     */
    public function storeMessage(User $user, Request $request): JsonResponse
    {
        $this->validate($request, [
            'message' => 'required|string|max:255',
        ]);
        $message = auth()->user()->sendMessage($user->id, $request->message);
        return response()->json(new MessageResource($message), Response::HTTP_ACCEPTED);
    }

    /**
     * @return JsonResponse
     */
    public function getDemoUsers(): JsonResponse
    {
        $users = User::limit(2)->get();
        return response()->json($users, Response::HTTP_ACCEPTED);
    }
}
