<h2 class="font-semibold mb-2 text-lg">Following</h2>
<ul class="font-semibold">
    @forelse (auth()->user()->following()->latest()->take(10)->get() as $user)
        <a href="{{ route('tweet.profile', $user) }}">
            <li class="mb-4">
                <img src="{{ $user->avatar }}" width="40" height="40" class="rounded-full inline-block mr-1">
                <span>{{ $user->name }}</span>
            </li>
        </a>
    @empty
        <p>No friends yet!</p>
    @endforelse
</ul>
