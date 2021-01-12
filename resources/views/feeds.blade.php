<div class="rounded-lg py-4">
    <div class="flex tweet">
        <div class="flex-shrink-0">
            <a href="{{ route('tweet.profile', $tweet->user->username) }}">
                <img src="{{ $tweet->user->avatar }}" width="40" height="40" class="rounded-full" alt="">
            </a>
        </div>
        <div class="ml-4">
            <a href="{{ route('tweet.profile', $tweet->user->username) }}">
                <span class="font-semibold mb-4 block">{{ $tweet->user->name }}</span>
            </a>
            <a href="{{ route('tweet.show-tweet', $tweet->id) }}">
                <p class="text-sm">{{ $tweet->body }}</p>
            </a>

            <likes-buttons :likes-count="{{ $tweet->likesCount() }}" :dislikes-count="{{ $tweet->dislikesCount() }}"
                id="{{ $tweet->id }}">
            </likes-buttons>
        </div>
    </div>
</div>
