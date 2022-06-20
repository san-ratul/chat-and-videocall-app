<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AuthenticationController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function register(Request $request): JsonResponse
    {
        $this->validate($request, [
            'name' =>   ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'confirmed'],
            'image' => ['required', 'image']
        ]);
        $input                  = $request->only(['name', 'email']);
        $input['profile_image'] = $this->uploadImage($request);
        $input['password']      = Hash::make($request->password);
        $user                   = User::create($input);
        $success['user']        =  UserResource::make($user);
        $success['token']       =  $user->createToken('VideoChatApp')->accessToken;
        return response()->json($success, Response::HTTP_ACCEPTED);
    }

    /**
     * @param Request $request
     * @return string
     */
    private function uploadImage(Request $request): string
    {
        //handle file upload
        $path = "";
        if($request->hasFile('image')){
            $path = '/'. Str::slug($request->name, '-'). '/'. time().'.'.$request->file('image')->getClientOriginalExtension();
            Storage::put('/public'.$path, file_get_contents($request->file('image')));
        }
        return '/storage'.$path;
    }

    /**
     * @return JsonResponse
     */
    public function getUsers(): JsonResponse
    {
        $userData = User::query()->whereNotIn('id', [auth()->user()->id] )->get();
        $users = UserResource::collection($userData);
        return response()->json($users, Response::HTTP_OK);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request): JsonResponse
    {
        $this->validate($request, [
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        if($user = User::query()->where('email', $request->email)->first()){
            if(Hash::check($request->password, $user->password)){
                $success['user']  =  UserResource::make($user);
                $success['token'] =  $user->createToken('VideoChatApp')->accessToken;
                return response()->json($success, Response::HTTP_ACCEPTED);
            }
        }
        $error['errors']['email'] = ["Credentials did not match"];
        return response()->json($error, Response::HTTP_UNAUTHORIZED);
    }

    /**
     * @return JsonResponse
     */
    public function logout(): JsonResponse
    {
        $token = auth()->user()->token();
        $token->revoke();
        $response = ['message' => 'You have been successfully logged out!'];
        return response()->json($response, Response::HTTP_ACCEPTED);
    }
}
