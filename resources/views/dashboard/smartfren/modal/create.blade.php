<!-- Modal -->
<div class="modal fade" id="createModal" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content rounded-5">
            <div class="modal-header">
                <h4 class="modal-title fw-semibold">
                    Tambah Data Smartfren
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('smartfren.store') }}" method="POST">
                    @csrf
                    <!-- Nama -->
                    <div class="mb-1">
                        <x-input-label for="nama" :value="('Nama')"/>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror"
                               name="nama" required autofocus value="{{ old('nama') }}">
                        <x-input-error :messages="$errors->get('nama')"/>
                    </div>

                    <!-- Masa Aktif -->
                    <div class="mb-1">
                        <x-input-label for="masa_aktif" :value="('Masa Aktif')"/>
                        <input type="text" class="form-control @error('masa_aktif') is-invalid @enderror" name="masa_aktif"
                               required autofocus value="{{ old('masa_aktif') }}">
                        <x-input-error :messages="$errors->get('masa_aktif')"/>
                    </div>

                    <!-- Kategori -->
                    <div class="mb-1">
                        <x-input-label for="kategori" :value="('Kategori')"/>
                        <x-select/>
                        <x-input-error :messages="$errors->get('kategori')"/>
                    </div>

                    <!-- Harga Asli -->
                    <div class="mb-1">
                        <x-input-label for="harga_asli" :value="('Harga Asli')"/>
                        <input type="number" class="form-control @error('harga_asli') is-invalid @enderror"
                               name="harga_asli" required autofocus value="{{ old('harga_asli') }}">
                        <x-input-error :messages="$errors->get('harga_asli')"/>
                    </div>

                    <!-- Harga Jual -->
                    <div class="mb-2">
                        <x-input-label for="harga_jual" :value="('Harga Jual')"/>
                        <input type="number" class="form-control @error('harga_jual') is-invalid @enderror"
                               name="harga_jual" required autofocus value="{{ old('harga_jual') }}">
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
