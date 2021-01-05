<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function follow(User $currentUser, User $user)
    {
        return $currentUser != $user;
    }

    public function editForm(User $currentUser, User $user)
    {
        return $currentUser == $user;
    }
}
