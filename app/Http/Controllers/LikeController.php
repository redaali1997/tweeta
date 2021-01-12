<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use App\Notifications\LikeNotification;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function like(Tweet $tweet)
    {
        if (request('liked')) {
            if ($tweet->isLikedBy(auth()->user())) {
                $tweet->deleteLike(auth()->user());
                return 'removed';
            }

            $tweet->like(auth()->user());
            if ($tweet->user != auth()->user()) {
                $tweet->user->notify(new LikeNotification($tweet, auth()->user()));
            }
            return 'liked';
        } else if (!request('liked')) {
            if ($tweet->isDislikedBy(auth()->user())) {
                $tweet->deleteLike(auth()->user());
                return 'removed';
            }

            $tweet->like(auth()->user(), false);
            return 'disliked';
        }
    }

    public function isLikedBy(Tweet $tweet)
    {
        if ($tweet->isLikedBy(auth()->user())) {
            return 'liked';
        } else if ($tweet->isDislikedBy(auth()->user())) {
            return 'disliked';
        }
    }
}
