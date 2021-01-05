<?php

namespace App\models;

trait Followable
{
    public function isFollow($user)
    {
        return $this->following()->where('following_user_id', $user->id)->exists();
    }

    public function toggleFollow($user)
    {
        $this->following()->toggle($user);
    }

    public function following()
    {
        return $this->belongsToMany(User::class, 'user_user', 'user_id', 'following_user_id')->withTimestamps();
    }

    /*
    public function follow($user)
    {
        $this->following()->save($user);
    }

    public function unfollow($user)
    {
        $this->following()->detach($user);
    }
    */
}
