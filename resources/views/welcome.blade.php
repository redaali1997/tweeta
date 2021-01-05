<x-master>
    <div class="flex justify-center items-center flex-col bg-teal-100 mx-auto p-8 rounded-xl mt-4 max-w-md">
        <h1 style="font-size: 100px" class="font-light font-serif">tweety</h1>
        <div class="mt-4">
            @auth
                <a href="{{ route('tweet.tweets') }}" class="bg-teal-500 text-white font-bold rounded-lg py-2 px-4">Home</a>
            @else
                <a href="{{ route('login') }}" class="bg-teal-500 text-white font-bold rounded-lg py-2 px-4">Login</a>
                <a href="{{ route('register') }}" class="bg-teal-800 text-white font-bold rounded-lg py-2 px-4">Register</a>
            @endauth
        </div>
    </div>
</x-master>
