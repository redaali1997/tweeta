<x-app>
    <h1 class="text-lg font-bold mb-4">Explore Friends</h1>
    <div>
        @foreach ($users as $user)
            <a href="{{ route('tweet.profile', $user->username) }}"
                class="flex items-center mb-5 {{ $loop->last ? '' : 'border-b border-teal-300' }} pb-4">
                <img src="{{ $user->avatar }}" alt="" width="50" class="rounded-lg mr-2">
                <h1 class="font-bold">{{ '@' . $user->username }}</h1>
            </a>
        @endforeach
        {{ $users->links() }}
    </div>
</x-app>
