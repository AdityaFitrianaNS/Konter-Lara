<!-- Modal -->
<div class="modal fade" id="edit" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content rounded-4">
            <div class="modal-header">
                <h4 class="modal-title fw-semibold">
                    Ubah Data Pengeluaran
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('pengeluaran.update') }}" method="POST">
                    @method("PUT")
                    @csrf
                    <div class="row g-2">
                        <!-- Nama -->
                        <div class="mb-2">
                            <x-input-label for="nama" :value="('Nama Item')"/>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                   name="nama" id="nama" required autofocus value="{{ old('nama') }}">
                            <x-input-error :messages="$errors->get('nama')"/>
                        </div>

                        <input type="hidden" name="slug" id="slug">


                        <!-- Harga -->
                        <div class="col-md-6 mb-2">
                            <x-input-label for="harga" :value="('Harga')"/>
                            <input type="number" class="form-control @error('harga') is-invalid @enderror"
                                   name="harga" id="harga" required autofocus value="{{ old('harga') }}">
                            <x-input-error :messages="$errors->get('jumlah')"/>
                        </div>

                        <!-- Jumlah -->
                        <div class="col-md-6 mb-2">
                            <x-input-label for="jumlah" :value="('Jumlah')"/>
                            <input type="number" class="form-control @error('jumlah') is-invalid @enderror"
                                   name="jumlah" id="jumlah" required autofocus value="{{ old('jumlah') }}">
                            <x-input-error :messages="$errors->get('jumlah')"/>
                        </div>

                        <!-- Total -->
                        <div class="mb-2">
                            <x-input-label for="total" :value="('Total')"/>
                            <input type="number" class="form-control @error('total') is-invalid @enderror"
                                   name="total" id="total" required autofocus value="{{ old('total') }}">
                            <x-input-error :messages="$errors->get('total')"/>
                        </div>

                        <!-- Keterangan -->
                        <div class="mb-2">
                            <x-input-label for="keterangan" :value="('Keterangan')"/>
                            <input type="text" class="form-control @error('keterangan') is-invalid @enderror"
                                   name="keterangan" id="keterangan" required autofocus value="{{ old('keterangan') }}">
                            <x-input-error :messages="$errors->get('keterangan')"/>
                        </div>
                    </div>

                    <!-- Button -->
                    <x-button-save :value="('Simpan')"/>
                    <x-button-cancel :value="('Batal')"/>
                </form>
            </div>
        </div>
    </div>
</div>
