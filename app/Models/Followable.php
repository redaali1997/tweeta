<?php

namespace App\models;

use App\Notifications\FollowNotification;

trait Followable
{
    public function isFollow($user)
    {
        return $this->following()->where('following_user_id', $user->id)->exists();
    }

    public function toggleFollow($user)
    {
        $response = $this->following()->toggle($user);
        if (!empty($response['attached'])) {
            $user->notify(new FollowNotification($this));
        }
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
