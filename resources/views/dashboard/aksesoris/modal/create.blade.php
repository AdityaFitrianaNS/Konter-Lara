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
                        <x-input-label for="nama" :value="('Nama Aksesoris')"/>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                               placeholder="Nama Aksesoris" required autofocus value="{{ old('nama') }}">
                        <x-input-error :messages="$errors->get('nama')"/>
                    </div>

                    <!-- Merk -->
                    <div class="mb-1">
                        <x-input-label for="merk" :value="('Merk')"/>
                        <input type="text" class="form-control @error('merk') is-invalid @enderror" name="merk"
                               placeholder="Merk" required autofocus value="{{ old('merk') }}">
                        <x-input-error :messages="$errors->get('merk')"/>
                    </div>

                    <!-- Kategori -->
                    <div class="mb-1">
                        <x-input-label for="kategori" :value="('Kategori')"/>
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
                        <x-input-label for="harga_asli" :value="('Harga Asli')"/>
                        <input type="number" class="form-control @error('harga_asli') is-invalid @enderror" name="harga_asli"
                               placeholder="Harga Asli" required autofocus value="{{ old('harga_asli') }}">
                        <x-input-error :messages="$errors->get('harga_asli')"/>
                    </div>

                    <!-- Harga Jual -->
                    <div class="mb-2">
                        <x-input-label for="harga_jual" :value="('Harga Jual')"/>
                        <input type="number" class="form-control @error('harga_jual') is-invalid @enderror" name="harga_jual"
                               placeholder="Harga Jual" required autofocus value="{{ old('harga_jual') }}">
                        <x-input-error :messages="$errors->get('harga_jual')"/>
                    </div>

                    <!-- Button -->
                    <x-button-save :value="('Simpan')"/>
                    <x-button-cancel :value="('Batal')"/>
                </form>
            </div>
        </div>
    </div>
</div>
