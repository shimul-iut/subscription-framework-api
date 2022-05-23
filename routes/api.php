<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Subscriber;
use App\Models\Post;
use App\Http\Resources\SubscriberResource;
use App\Http\Resources\PostResource;

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


Route::get('posts/{id}', function($id) {
    return new PostResource(Post::findOrFail($id));
});



Route::delete('posts/{id}', function($id) {
    Post::find($id)->delete();

    return 204;
});

Route::get('subscribers/{id}', function($id) {
    return new SubscriberResource(Subscriber::findOrFail($id));
});




