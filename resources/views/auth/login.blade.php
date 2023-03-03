<x-guest-layout>
    <main class="d-flex w-100">
    <div class="container d-flex flex-column">
        <div class="row vh-100">
            <div class="col-sm-10 col-md-8 col-lg-4 mx-auto d-table h-100">
                <div class="d-table-cell align-middle">
                    <div class="card rounded-4">
                        <div class="card-body">
                            <div class="m-sm-4">
                                <div class="text-center mb-2">
                                    <img src="img/store-icon.png" alt="Charles Hall"
                                         class="img-fluid rounded-circle" width="130" height="130"/>
                                </div>

                                <form method="POST" action="{{ route('login') }}" class="flex flex-col gap-2">
                                    @csrf
                                    <!-- Email -->
                                    <div class="mb-2">
                                        <x-input-label for="email" :value="__('Email')"/>
                                        <x-form-input id="email" type="email" name="email" :value="old('email')"
                                                      placeholder="Enter your email" required autofocus/>
                                        <x-input-error :messages="$errors->get('email')"/>
                                    </div>

                                    <!-- Email -->
                                    <div class="mb-1">
                                        <x-input-label for="password" :value="__('Password')"/>
                                        <x-form-input id="password" type="password" name="password" :value="old('password')"
                                                      placeholder="Enter your password" required autofocus/>
                                        <x-input-error :messages="$errors->get('password')"/>
                                    </div>

                                    <div class="mt-2">
                                        <label class="form-check">
                                            <input class="form-check-input rounded-5" type="checkbox"
                                                   value="remember-me" name="remember-me" checked>
                                            <span class="form-check-label"> Remember me next time</span>
                                        </label>
                                    </div>
                                    <div class="text-center my-2">
                                        <x-button-save class="btn-secondary" :value="('Login')"/>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</x-guest-layout>
