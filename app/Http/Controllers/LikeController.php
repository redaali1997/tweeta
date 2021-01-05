<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function like(Tweet $tweet)
    {
        if ($tweet->isLikedBy(auth()->user())) {
            $tweet->deleteLike(auth()->user());
            return back();
        }

        $tweet->like(auth()->user());
        return back();
    }

    public function dislike(Tweet $tweet)
    {
        if ($tweet->isDislikedBy(auth()->user())) {
            $tweet->deleteLike(auth()->user());
            return back();
        }

        $tweet->like(auth()->user(), false);
        return back();
    }
}
