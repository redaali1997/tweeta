<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use App\Notifications\LikeNotification;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function like(Tweet $tweet)
    {
        if ($tweet->isLikedBy(auth()->user())) {
            $tweet->deleteLike(auth()->user());
            return 'removed';
        }

        $tweet->like(auth()->user());

        if ($tweet->user != auth()->user()) {
            $tweet->user->notify(new LikeNotification($tweet, auth()->user()));
        }

        return 'done';
    }

    public function dislike(Tweet $tweet)
    {
        if ($tweet->isDislikedBy(auth()->user())) {
            $tweet->deleteLike(auth()->user());
            return 'removed';
        }

        $tweet->like(auth()->user(), false);
        return 'done';
    }

    public function isLikedBy(Tweet $tweet)
    {
        return $tweet->isLikedBy(auth()->user());
    }

    public function isDislikedBy(Tweet $tweet)
    {
        return $tweet->isDislikedBy(auth()->user());
    }
}
