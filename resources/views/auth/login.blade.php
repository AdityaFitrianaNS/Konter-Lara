<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <h2 class="font-bold text-2xl text-sky-600">Login</h2>
    <p class="text-sm mt-1 text-sky-600">If you already a admin, easily log in</p>

    <form method="POST" action="{{ route('login') }}" class="flex flex-col gap-2">
        @csrf
        <div>
            <x-input-label for="email" :value="__('Email')" class="mt-3"/>
            <x-text-input id="email" type="email" name="email" :value="old('email')" placeholder="Email" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2"/>
        </div>

        <div>
            <x-input-label for="password" :value="__('Password')"/>
            <x-text-input id="password" type="password" name="password" placeholder="Password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="block">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <x-primary-button>
            {{ __('LOGIN') }}
        </x-primary-button>

        <div class="flex items-center border-b border-gray-400 py-1">
            @if (Route::has('password.request'))
                <a class="text-sm text-gray-600 hover:text-gray-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>
    </form>
</x-guest-layout>
