<div class="border border-teal-300 hover:border-teal-600 rounded-lg p-4" style="height: 200px">
    <form action="{{ route('tweet.store') }}" method="POST">
        @csrf
        <div class="border-b pb-4 focus:border-teal-600">
            <textarea placeholder="Your tweet!" autofocus class="w-full h-20 outline-none" name="body"></textarea>
        </div>
        <div class="flex justify-between mt-4">
            <div>
                <img width="40" height="40" src="{{ auth()->user()->avatar }}" class="rounded-full" alt="">
            </div>
            <button type="submit"
                class="font-semibold rounded-lg py-2 px-4 bg-teal-500 hover:bg-teal-700 text-white">Tweet-a-roo!</button>
        </div>

        @include('errors')
        {{-- @error('body')
        <p class="text-red-600 mt-4 text-sm">{{ $message }}</p>
        @enderror --}}
    </form>
</div>
