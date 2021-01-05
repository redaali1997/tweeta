<x-master>
    <div class="container mx-auto mt-6">
        <div class="flex justify-between items-start xs:flex-col">
            @auth
                {{-- Left Bar --}}
                <div class="mt-2">
                    @include('left-bar')
                </div>
            @endauth

            {{-- Feeds --}}
            <div class="flex w-3/6 flex-col">
                {{ $slot }}
            </div>

            @auth
                {{-- Right Bar --}}
                <div class="bg-teal-100 p-4 rounded-lg inline-block">
                    @include('right-bar')
                </div>
            @endauth
        </div>
    </div>
</x-master>
