<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\likeController;
use App\Http\Controllers\CommetController;



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

Route::post('/register',[AuthController::class, 'register']);
Route::post('/login',[AuthController::class, 'login']);


Route::group(['middleware'=>['auth:sanctum']],function(){

Route::get('/user', [AuthController::class, 'user']);
Route::put('/user', [AuthController::class, 'update']);
Route::post('/logout', [AuthController::class, 'logout']);

    // Post
Route::get('/posts', [PostController::class, 'index']); // all posts
Route::post('/posts', [PostController::class, 'store']); // create post
Route::get('/posts/{id}', [PostController::class, 'show']); // get single post
Route::put('/posts/{id}', [PostController::class, 'update']); // update post
Route::delete('/posts/{id}', [PostController::class, 'destroy']); // delete post

Route::get('/posts/{id}/comments',[CommetController::class, 'index']);
Route::post('/posts/{id}/comments',[CommetController::class, 'store']);
Route::put('/comments/{id}',[CommetController::class, 'update']);
Route::delete('/comments/{id}',[CommetController::class, 'destroy']);


Route::post('/posts/{id}/likes',[likeController::class, 'like']);


});






