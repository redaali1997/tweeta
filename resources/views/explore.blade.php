<x-app>
    <h1 class="text-lg font-bold mb-4">Explore Friends</h1>
    <div>
        <div class="tweet">
            @foreach ($users as $user)
                @include('users')
            @endforeach
        </div>
        {{ $users->links() }}
    </div>
</x-app>
