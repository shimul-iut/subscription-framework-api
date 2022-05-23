<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\Subscriber;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'api'], function() {
    
    Route::get('posts', [PostController::class, 'index']);

    Route::post('posts/create', [PostController::class, 'store']);

    Route::post('user/subscribe', [SubscriberController::class, 'store']);
});

// Route::get('/token', function () {
//     return csrf_token(); 
// });