<!-- Modal -->
<div class="modal fade" id="createModal" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content rounded-5">
            <div class="modal-header">
                <h4 class="modal-title fw-semibold">
                    Tambah Data Pengeluaran
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('pengeluaran.store') }}" method="POST">
                    @csrf
                    <div class="row g-2">
                        <!-- Nama -->
                        <div class="mb-2">
                            <x-input-label for="nama" :value="('Nama Item')"/>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                   name="nama" required autofocus value="{{ old('nama') }}">
                            <x-input-error :messages="$errors->get('nama')"/>
                        </div>

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
                                   name="keterangan" required autofocus value="{{ old('keterangan') }}">
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
