<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function show(User $user)
    {
        return view('profile', [
            'user' => $user,
        ]);
    }

    public function follow(User $user)
    {
        auth()->user()->toggleFollow($user);

        return back();
    }

    public function edit(User $user)
    {
        // abort_if(current_user() != $user, 403);
        // $this->authorize('editForm', $user);
        return view('profile-edit', compact('user'));
    }

    public function update(User $user)
    {
        $attributes = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'alpha_dash', Rule::unique('users')->ignore($user), 'max:255'],
            'avatar' => ['file'],
            'email' => ['required', 'email', 'string', 'max:255'],
            'password' => ['required', 'confirmed', 'min:8', 'max:255'],
        ]);

        if (request()->file('avatar')) {
            $attributes['avatar'] = request()->file('avatar')->storeAs('avatars', $user->id . '.' . request()->file('avatar')->extension());
        }

        $user->update($attributes);

        return redirect()->route('tweet.profile', $user->username);
    }
}
