<?php

use App\Http\Controllers\ExploreController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TweetController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::middleware(['auth'])->name('tweet.')->group(function () {
    Route::get('/explore', ExploreController::class)->name('explore');
    Route::get('/tweets', [TweetController::class, 'index'])->name('tweets');
    Route::post('/tweet', [TweetController::class, 'store'])->name('store');
    Route::get('/{tweet}', [TweetController::class, 'show'])->name('show-tweet');
    Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile');
    Route::post('/follow/{user}', [ProfileController::class, 'follow'])->name('follow');
    Route::get('/profile/{user}/edit', [ProfileController::class, 'edit'])->name('edit')->middleware('can:editForm,user');
    Route::patch('/profile/{user}/edit', [ProfileController::class, 'update'])->name('update')->middleware('can:editForm,user');
});
