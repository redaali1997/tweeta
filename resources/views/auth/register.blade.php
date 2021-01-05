<x-master>
    <div class="flex justify-center bg-teal-200 p-3 mt-6">
        <div class="container mx-auto max-w-sm">
            <div class="mt-2 font-semibold text-4xl text-teal-700 text-center">{{ __('Register') }}</div>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mt-2">
                    <label class="mb-1 font-semibold uppercase block" for="name">{{ __('Name') }}</label>
                    <input class="outline-none bg-teal-300 w-full py-1 px-2" id="name" type="text" @error('name')
                        is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name"
                        autofocus>

                    @error('name')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mt-2">
                    <label class="mb-1 font-semibold uppercase block" for="username">{{ __('username') }}</label>
                    <input class="outline-none bg-teal-300 w-full py-1 px-2" id="username" type="text"
                        @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required
                        autocomplete="username" autofocus>

                    @error('username')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mt-2">
                    <label class="mb-1 font-semibold uppercase block" for="email">{{ __('E-Mail Address') }}</label>
                    <input class="outline-none bg-teal-300 w-full py-1 px-2" id="email" type="email" @error('email')
                        is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mt-2">
                    <label class="mb-1 font-semibold uppercase block" for="password">{{ __('Password') }}</label>
                    <input class="outline-none bg-teal-300 w-full py-1 px-2" id="password" type="password"
                        @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mt-2">
                    <label class="mb-1 font-semibold uppercase block"
                        for="password-confirm">{{ __('Confirm Password') }}</label>
                    <input class="outline-none bg-teal-300 w-full py-1 px-2" id="password-confirm" type="password"
                        name=" password_confirmation" required autocomplete="new-password">
                </div>

                <button type="submit" class="bg-teal-500 rounded-lg py-2 px-4 text-white mt-4">
                    {{ __('Register') }}
                </button>
            </form>
        </div>
    </div>
</x-master>
