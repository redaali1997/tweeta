<?php

namespace App\models;

trait Likable
{
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function like($user, $liked = true)
    {
        $this->likes()->UpdateOrCreate(['user_id' => $user ? $user->id : auth()->user()->id], ['liked' => $liked]);
    }

    public function dislike($user)
    {
        $this->like($user, false);
    }

    public function likesCount()
    {
        return $this->likes()->where('liked', true)->count();
    }

    public function dislikesCount()
    {
        return $this->likes()->where('liked', false)->count();
    }

    public function isLikedBy($user)
    {
        return $this->likes()->where('user_id', $user->id)->where('liked', true)->exists();
    }

    public function isDislikedBy($user)
    {
        return $this->likes()->where('user_id', $user->id)->where('liked', false)->exists();
    }

    public function deleteLike($user)
    {
        $this->likes()->where('user_id', $user->id)->delete();
    }
}
