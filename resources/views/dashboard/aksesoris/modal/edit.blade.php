<!-- Modal -->
<div class="modal fade" id="edit" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content rounded-4">
            <div class="modal-header">
                <h4 class="modal-title fw-semibold">
                    Ubah Aksesoris
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('aksesoris.update') }}" method="POST">
                    @method("PUT")
                    @csrf
                    <!-- Nama Aksesoris -->
                    <div class="mb-1">
                        <x-input-label for="nama" :value="('Nama Aksesoris')"/>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror"
                               name="nama" id="nama" required autofocus>
                        <x-input-error :messages="$errors->get('nama')"/>
                    </div>

                    <input type="hidden" name="slug" id="slug">

                    <!-- Merk -->
                    <div class="mb-1">
                        <x-input-label for="merk" :value="('Merk')"/>
                        <input type="text" class="form-control @error('merk') is-invalid @enderror"
                               name="merk" id="merk" required autofocus>
                        <x-input-error :messages="$errors->get('merk')"/>
                    </div>

                    <!-- Kategori -->
                    <div class="mb-1">
                        <x-input-label for="kategori" :value="('Kategori')"/>
                        <select class="form-select @error('kategori') is-invalid @enderror" name="kategori"
                                id="kategori">
                            <option selected disabled>Pilih Kategori</option>
                            <option value="earphone">Earphone</option>
                            <option value="charger">Charger</option>
                            <option value="charger">Casing</option>
                            <option value="charger">USB Card</option>
                        </select>
                        <x-input-error :messages="$errors->get('kategori')"/>
                    </div>

                    <!-- Harga Asli -->
                    <div class="mb-1">
                        <x-input-label for="harga_asli" :value="('Harga Asli')"/>
                        <input type="text" class="form-control @error('harga_asli') is-invalid @enderror"
                               name="harga_asli" id="harga_asli" required autofocus>
                        <x-input-error :messages="$errors->get('harga_asli')"/>
                    </div>

                    <!-- Harga Jual -->
                    <div class="mb-1">
                        <x-input-label for="harga_jual" :value="('Harga Jual')"/>
                        <input type="text" class="form-control @error('harga_jual') is-invalid @enderror"
                               name="harga_jual" id="harga_jual" required autofocus>
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
