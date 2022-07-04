<?php

use App\Http\Controllers\Api\AuthenticationController;
use App\Http\Controllers\Api\MessageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', [AuthenticationController::class, 'register']);
Route::post('login', [AuthenticationController::class, 'login']);
Route::get('/demo-users', [MessageController::class, 'getDemoUsers']);
Route::group(['middleware' => 'auth:api'], function() {
    Route::post('logout', [AuthenticationController::class, 'logout']);
    Route::get('users', [AuthenticationController::class, 'getUsers']);
    Route::get('messages/{user}', [MessageController::class, 'getMessages']);
    Route::post('messages/{user}', [MessageController::class, 'storeMessage']);
});
