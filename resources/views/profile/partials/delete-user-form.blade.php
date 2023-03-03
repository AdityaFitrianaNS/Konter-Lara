<section class="space-y-6">
    <header>
        <h3 class="fw-bold text-gray-900">
            {{ __('Delete Account') }}
        </h3>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Setelah akun Anda dihapus, semua data dan informasi yang ada di dalamnya akan dihapus secara permanen. Sebelum menghapus akun Anda, silakan unduh data atau informasi apa pun yang ingin Anda simpan.') }}
        </p>
    </header>

    <button class="btn btn-secondary btn-md fw-bold rounded-4 w-15" data-bs-toggle="modal"
            data-bs-target="#deleteModal">
        Delete Account
    </button>

    <div class="modal fade" id="deleteModal" tabindex="-1">
        <div class="modal-dialog modal-sm">
            <div class="modal-content rounded-5">
                <div class="modal-body">
                    <form method="post" action="{{ route('profile.destroy') }}">
                        @csrf
                        @method('delete')

                        <h4 class="fw-semibold">
                            {{ __('Apakah kamu yakin ingin menghapus akun?') }}
                        </h4>

                        <p>
                            {{ __('Setelah akun Anda dihapus, semua data dan informasi yang ada di dalamnya akan dihapus secara permanen. Sebelum menghapus akun Anda, silakan unduh data atau informasi apa pun yang ingin Anda simpan.') }}
                        </p>

                        <div class="mb-2">
                            <x-input-label for="password" value="{{ __('Password') }}" class="sr-only"/>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                   id="password" name="password" required autofocus value="{{ old('password') }}">
                            <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2"/>
                        </div>

                        <!-- Button -->
                        <x-button-save :value="('Yes, Delete Account')"/>
                        <x-button-cancel :value="('No, Cancel')"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
