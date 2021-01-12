<?php

use App\Http\Controllers\LikeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\TweetController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware('auth:sanctum')->group(function () {
    Route::post('/{tweet}/like', [LikeController::class, 'like'])->name('like');
    Route::post('/{tweet}/dislike', [LikeController::class, 'dislike'])->name('dislike');
    Route::get('/{tweet}/isLikedBy', [LikeController::class, 'isLikedBy'])->name('isLikedBy');
    Route::get('/{tweet}/isDislikedBy', [LikeController::class, 'isDislikedBy'])->name('isDislikedBy');
    Route::get('/notifications', [NotificationController::class, 'index']);
    Route::post('/{notification}/markasread', [NotificationController::class, 'markAsRead']);
});
