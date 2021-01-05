<x-app>
    @include('new-tweet')
    <div class="mt-8">
        <div class="border border-teal-300 rounded-xl mb-8 p-4">
            @forelse ($tweets as $tweet)
                @include('feeds')
            @empty
                <p class="font-semibold text-center py-4">No tweets yet.</p>
            @endforelse
            {{ $tweets->links() }}
        </div>
    </div>
</x-app>
