<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;


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

Route::group(['middleware'=>'api'],function($routes){

    Route::post('/register', [PostController::class, 'register']);
    Route::post('/login', [PostController::class, 'login']);
    Route::post('/profile', [PostController::class, 'profile']);
    Route::post('/refresh', [PostController::class, 'refresh']);
    Route::post('/logout', [PostController::class, 'logout']);


});

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::group(['middleware' => 'auth:api'], function($routes){
    Route::apiResource("post", PostController::class);
    // Route::apiResource("comment", CommentController::class);
    Route::post('post/{id}/comment/create', [CommentController::class, 'create']);
});

// Route::post("login", [PostController::class, 'index']);

