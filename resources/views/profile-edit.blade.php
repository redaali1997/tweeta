<x-app>
    <h1 class="font-semibold text-lg">Edit profile</h1>

    @include('errors')

    <form action="{{ route('tweet.update', $user->username) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="mt-4">
            <label for="name" class="font-semibold">NAME</label>
            <div class="mt-1">
                <input class="w-full p-2 border border-gray-400 outline-none" type="text" id="name" name="name"
                    value="{{ $user->name }}" required>
            </div>
        </div>
        <div class="mt-4">
            <label for="username" class="font-semibold uppercase">username</label>
            <div class="mt-1">
                <input class="w-full p-2 border border-gray-400 outline-none" type="text" id="username" name="username"
                    value="{{ $user->username }}" required>
            </div>
        </div>
        <div class="mt-4">
            <label for="email" class="font-semibold uppercase">email</label>
            <div class="mt-1">
                <input class="w-full p-2 border border-gray-400 outline-none" type="email" id="email" name="email"
                    value="{{ $user->email }}" required>
            </div>
        </div>
        <div class="mt-4">
            <label for="avatar" class="font-semibold uppercase">avatar</label>
            <div class="flex items-end">
                <div class="flex-1 mt-1">
                    <input class="w-full p-2 border border-gray-400 outline-none" type="file" id="avatar" name="avatar"
                        value="{{ $user->avatar }}">
                </div>
                <div>
                    <img src="{{ $user->avatar }}" width="47" height="47" alt="">
                </div>
            </div>
        </div>
        <div class="mt-4">
            <label for="password" class="font-semibold uppercase">password</label>
            <div class="mt-1">
                <input class="w-full p-2 border border-gray-400 outline-none" type="password" id="password"
                    name="password" required>
            </div>
        </div>
        <div class="mt-4">
            <label for="password_confirmation" class="font-semibold uppercase">password confirmation</label>
            <div class="mt-1">
                <input class="w-full p-2 border border-gray-400 outline-none" type="password" id="password_confirmation"
                    name="password_confirmation" required>
            </div>
        </div>

        <button type="submit" class="py-1 px-3 text-xl mt-4 bg-teal-500 text-white rounded-lg mb-8 mr-4">Save</button>
        <a href="{{ route('tweet.profile', $user) }}" class="font-semibold text-xl">Cancel</a>
    </form>
</x-app>
