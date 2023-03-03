<section>
    <header>
        <h3 class="fw-bold">
            {{ __('Informasi Profil') }}
        </h3>

        <p class="mt-1">
            {{ __("Perbarui informasi profil akun dan alamat email.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}" class="mt-4">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Nama')" />
            <input type="text" class="form-control @error('name') is-invalid @enderror"
                   id="name" name="name" required autofocus value="{{ old('name', $user->name) }}">
            <x-input-error class="mt-2" :messages="$errors->get('name')"/>
        </div>

        <div class="mt-2">
            <x-input-label for="email" :value="__('Email')" />
            <input type="text" class="form-control @error('email') is-invalid @enderror"
                   name="email" id="email" required autofocus value="{{ old('email', $user->email) }}">
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="mt-2">
            <x-button-profile :value="('Perbarui')"/>
        </div>
    </form>
</section>
