<!-- Modal -->
<div class="modal fade" id="edit" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content rounded-4">
            <div class="modal-header">
                <h4 class="modal-title fw-semibold">
                    Ubah Data Xl
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('xl.update') }}" method="POST">
                    @method("PUT")
                    @csrf
                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="slug" id="slug">
                    
                    <!-- Nama -->
                    <div class="mb-2">
                        <x-input-label for="nama" :value="('Nama')"/>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror"
                               name="nama" id="nama" required autofocus>
                        <x-input-error :messages="$errors->get('nama')"/>
                    </div>

                    <input type="hidden" name="slug" id="slug">

                    <!-- Masa Aktif -->
                    <div class="mb-2">
                        <x-input-label for="masa_aktif" :value="('Masa Aktif')"/>
                        <input type="text" class="form-control @error('masa_aktif') is-invalid @enderror"
                               name="masa_aktif" id="masa_aktif" required autofocus>
                        <x-input-error :messages="$errors->get('masa_aktif')"/>
                    </div>

                    <!-- Kategori -->
                    <div class="mb-2">
                        <x-input-label for="kategori" :value="('Kategori')"/>
                        <x-select/>
                        <x-input-error :messages="$errors->get('masa_aktif')"/>
                    </div>

                    <!-- Harga Asli -->
                    <div class="mb-2">
                        <x-input-label for="harga_asli" :value="('Harga Asli')"/>
                        <input type="text" class="form-control @error('harga_asli') is-invalid @enderror"
                               name="harga_asli" id="harga_asli" required autofocus>
                        <x-input-error :messages="$errors->get('harga_asli')"/>
                    </div>

                    <!-- Harga Jual -->
                    <div class="mb-2">
                        <x-input-label for="harga_jual" :value="('Harga Jual')"/>
                        <input type="text" class="form-control @error('harga_jual') is-invalid @enderror"
                               name="harga_jual" id="harga_jual" required autofocus>
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
