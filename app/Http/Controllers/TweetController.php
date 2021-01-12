<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use App\Models\User;
use Illuminate\Http\Request;

class TweetController extends Controller
{
    public function index()
    {
        return view('home', [
            'tweets' => auth()->user()->timeline()
        ]);
    }

    public function store()
    {
        request()->validate([
            'body' => 'required|max:255'
        ]);

        auth()->user()->tweets()->create([
            'body' => request('body')
        ]);

        return back();
    }

    public function show(Tweet $tweet)
    {
        return view('show-tweet', compact('tweet'));
    }
}
