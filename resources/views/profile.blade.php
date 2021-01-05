<x-app>
    <div class="relative">
        <img class="rounded-xl"
            src="https://www.shutterstock.com/blog/wp-content/uploads/sites/5/2017/08/nature-design.jpg" alt="">
        <img class="absolute rounded-full" style="bottom: -40px;left: calc(50% - 50px);" src="{{ $user->avatar }}"
            alt="Avatar" width="100" height="100">
    </div>
    <div class="flex justify-between items-center p-2">
        <div>
            <h1 class="font-semibold text-lg w-48">{{ $user->name }}</h1>
            <p class="text-sm">{{ $user->created_at->diffForHumans() }}</p>
        </div>
        <div>
            @can('editForm', $user)
                <a href="{{ route('tweet.edit', $user->username) }}"
                    class="py-2 px-2 rounded-full border border-teal-200 text-sm">Edit Profile</a>
            @endcan

            @can('follow', $user)
                <form class="inline" action="{{ route('tweet.follow', $user->username) }}" method="POST">
                    @csrf
                    <button class="py-2 px-2 rounded-full bg-teal-600 text-white text-sm" type="submit">
                        {{ auth()->user()->isFollow($user)
                                ? 'Unfollow'
                                : 'Follow' }}
                    </button>
                </form>
            @endcan
        </div>
    </div>
    <div class="border border-teal-300 rounded-xl mb-8 px-4">
        @forelse ($user
            ->tweets()
            ->latest()
            ->get()
            as $tweet)
            @include('feeds')
        @empty
            <p class="text-center font-semibold p-4">No tweets yet.</p>
        @endforelse
    </div>
</x-app>
