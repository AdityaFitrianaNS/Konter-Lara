<!-- Modal -->
<div class="modal fade" id="createModal" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content rounded-4">
            <div class="modal-header">
                <h4 class="modal-title fw-semibold">
                    Tambah Aksesoris
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('aksesoris.store') }}" method="POST">
                    @csrf
                    <!-- Nama Aksesoris -->
                    <div class="mb-1">
                        <label for="nama" class="form-label fw-semibold">Nama Aksesoris</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror"
                               name="nama" id="nama" required autofocus value="{{ old('nama') }}">
                        <x-input-error :messages="$errors->get('nama')"/>
                    </div>

                    <!-- Merk -->
                    <div class="mb-1">
                        <label for="merk" class="form-label fw-semibold">Merk</label>
                        <input type="text" class="form-control @error('merk') is-invalid @enderror" name="merk"
                               required autofocus value="{{ old('merk') }}">
                        <x-input-error :messages="$errors->get('merk')"/>
                    </div>

                    <!-- Kategori -->
                    <div class="mb-1">
                        <label for="kategori" class="form-label fw-semibold">Kategori</label>
                        <select class="form-select @error('kategori') is-invalid @enderror" name="kategori">
                            @if (old('kategori'))
                                <option value="{{ old('kategori') }}">{{ old('kategori') }}</option>
                                <option value="earphone">Earphone</option>
                                <option value="charger">Charger</option>
                                <option value="charger">Casing</option>
                                <option value="charger">USB Card</option>
                            @else
                                <option selected disabled>Pilih Kategori</option>
                                <option value="earphone">Earphone</option>
                                <option value="charger">Charger</option>
                                <option value="charger">Casing</option>
                                <option value="charger">USB Card</option>
                            @endif
                        </select>
                        <x-input-error :messages="$errors->get('kategori')"/>
                    </div>

                    <!-- Harga Asli -->
                    <div class="mb-1">
                        <label for="harga_asli" class="form-label fw-semibold">Harga Asli</label>
                        <input type="number" class="form-control @error('harga_asli') is-invalid @enderror"
                               name="harga_asli" required autofocus value="{{ old('harga_asli') }}">
                        <x-input-error :messages="$errors->get('harga_asli')"/>
                    </div>

                    <!-- Harga Jual -->
                    <div class="mb-2">
                        <label for="harga_jual" class="form-label fw-semibold">Harga Jual</label>
                        <input type="number" class="form-control @error('harga_jual') is-invalid @enderror"
                               name="harga_jual" required autofocus value="{{ old('harga_jual') }}">
                        <x-input-error :messages="$errors->get('harga_jual')"/>
                    </div>

                    <!-- Button -->
                    <x-button-save :value="('Simpan')"/>
                    <x-button-cancel :value="('Cancel')"/>
                </form>
            </div>
        </div>
    </div>
</div>
