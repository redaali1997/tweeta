<x-master>
    <div class="flex justify-center bg-teal-200 p-3 mt-6 max-w-md mx-auto rounded-lg">
        <div class="container mx-auto max-w-sm">
            <div class="mt-2 font-semibold text-4xl text-teal-700 text-center">{{ __('Login') }}</div>
            <form method="POST" action="{{ route('login') }}" class="mt-4">
                @csrf
                <div class="mb-2">
                    <label class="mb-1 font-semibold uppercase block" for="email">{{ __('E-Mail Address') }}</label>
                    <input class="outline-none bg-teal-300 w-full py-1 px-2" id="email" type="email" @error('email')
                        is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"
                        autofocus>

                    @error('email')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-2">
                    <label class="mb-1 font-semibold uppercase block" for="password">{{ __('Password') }}</label>
                    <input class="outline-none bg-teal-300 w-full py-1 px-2" id="password" type="password"
                        @error('password') is-invalid @enderror" name="password" required
                        autocomplete="current-password">
                    @error('password')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="mb-2">
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label for="remembe mb-2r">
                        {{ __('Remember Me') }}
                    </label>
                </div>

                <button type="submit" class="mb-2 py-2 px-4 rounded-xl bg-teal-500">
                    {{ __('Login') }}
                </button>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="mb-2 py-2 px-4 rounded-xl border border-teal-500">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </form>
        </div>
    </div>
</x-master>
