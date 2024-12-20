<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        <div class="text-center justify-center mb-10">
            <h1 class="font-bold text-3xl">SILAHKAN MASUK</h1>
        </div>
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" autofocus
                autocomplete="email" placeholder="Masukkan Email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                autocomplete="current-password" placeholder="Masukkan Password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        {{-- Captcha | Curently Non Active While Developing -> LoginRequest.php --}}
        <div class="mt-4">
            <x-input-label for="captcha" :value="__('Captcha')" />
            <div class="flex">
                <img src="{{ captcha_src('math') }}" alt="captcha" id="captcha-image" class="">
                <button type="button" onclick="refreshCaptcha()"
                    class="ml-4 inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">&#x21bb;</button>
            </div>
            <x-text-input id="captcha" class="block mt-1 w-full" type="text" name="captcha" autocomplete="off"
                placeholder="Masukkan Captcha" />
            <x-input-error :messages="$errors->get('captcha')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>

        <!-- Register Link -->
        <div class="mt-4 text-center">
            <span class="text-gray-600">Belum punya akun?</span>
            <a href="{{ route('register') }}" class="text-indigo-600 hover:text-indigo-900 font-semibold">
                Daftar disini
            </a>
        </div>
    </form>

    <script>
        function refreshCaptcha() {
            const captchaImage = document.getElementById('captcha-image');
            captchaImage.src = '{{ captcha_src('math') }}' + '?' + Date.now();
        }
    </script>
</x-guest-layout>
