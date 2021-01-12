<a href="{{ route('tweet.profile', $user->username) }}"
    class="flex items-center {{ $loop->last ? '' : 'border-b border-teal-300 mb-5' }} pb-4">
    <img src="{{ $user->avatar }}" alt="" width="50" class="rounded-lg mr-2">
    <div>
        <h1 class="font-bold">{{ $user->name }}</h1>
        <span class="text-sm">{{ '@' . $user->username }}</span>
    </div>
</a>
