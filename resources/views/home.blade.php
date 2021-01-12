<x-app>
    @include('new-tweet')
    <div class="mt-8">
        <div class="border border-teal-300 rounded-xl mb-8 py-2 px-4">
            @forelse ($tweets as $tweet)
                <div class="{{ $loop->last ? '' : 'border-b border-teal-200' }}">
                    @include('feeds')
                </div>
            @empty
                <p class="font-semibold text-center py-4">No tweets yet.</p>
            @endforelse
            {{ $tweets->links() }}
        </div>
    </div>
</x-app>
