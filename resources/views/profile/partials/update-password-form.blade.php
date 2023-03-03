<section>
    <header>
        <h3 class="fw-bold">
            {{ __('Perbarui Password') }}
        </h3>

        <p class="mt-1">
            {{ __('Pastikan akun menggunakan kata sandi acak yang panjang agar tetap aman.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-4">
        @csrf
        @method('put')

        <div>
            <x-input-label for="current_password" :value="__('Current Password')" />
            <input type="password" class="form-control @error('current_password') is-invalid @enderror"
                   id="current_password" name="current_password" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div class="mt-2">
            <x-input-label for="password" :value="__('New Password')" />
            <input type="password" class="form-control @error('password') is-invalid @enderror"
                   id="password" name="password" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div class="mt-2">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                   id="password_confirmation" name="password_confirmation" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="mt-2">
            <x-button-profile :value="('Perbarui')"/>
        </div>
    </form>
</section>
