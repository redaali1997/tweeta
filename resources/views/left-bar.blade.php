<ul class="text-lg font-bold font-sans">
    <li class="hover:text-teal-400 mb-4"><a href="{{ route('tweet.tweets') }}">Home</a></li>
    <li class="hover:text-teal-400 mb-4"><a href="{{ route('tweet.explore') }}">Explore</a></li>
    <li class="hover:text-teal-400 mb-4"><a href="{{ route('tweet.profile', auth()->user()->username) }}">Profile</a>
    </li>
    <li class="hover:text-teal-400 mb-4">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="font-bold text-red-500">Logout</button>
        </form>
    </li>
</ul>
