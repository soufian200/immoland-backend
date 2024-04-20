<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {
     // Route to get user information
     Route::get('/user', [UserController::class, 'getUserInfo']);
    Route::get('/users/{userId}', [UserController::class, 'getUserById']);


    Route::post('/posts', [PostController::class, 'store']);
     // Route to get all posts created by a specific user
     Route::get('/users/{userId}/posts', [PostController::class, 'getUserPosts']);
     Route::delete('/posts/{postId}', [PostController::class, 'deletePost']);
     Route::get('/posts/{postId}', [PostController::class, 'getPostDetail']);
     Route::get('/posts', [PostController::class, 'getPosts']);


});


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
