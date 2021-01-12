<x-app>
    <div class="border border-teal-200 p-4 rounded-lg">
        @include('feeds')
    </div>
    <div class="border border-teal-300 px-4 rounded-lg mt-2 tweet">
        <h1 class="font-semibold my-4">People who liked this tweeta</h1>
        @foreach ($tweet->users() as $user)
            @include('users')
        @endforeach
    </div>
</x-app>
