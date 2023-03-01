<!-- Modal -->
<div class="modal fade" id="edit" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content rounded-4">
            <div class="modal-header">
                <h4 class="modal-title fw-semibold">
                    Ubah Data Pemasukan
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('pemasukan.update') }}" method="POST">
                    @method("PUT")
                    @csrf
                    <div class="row g-2">
                        <!-- Nama -->
                        <div class="col-md-6 mb-1">
                            <x-input-label for="nama" :value="('Nama')"/>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                   name="nama" id="nama" required autofocus>
                            <x-input-error :messages="$errors->get('nama')"/>
                        </div>

                        <input type="hidden" name="slug" id="slug">

                        <!-- Harga -->
                        <div class="col-md-6 mb-1">
                            <x-input-label for="harga" :value="('Harga')"/>
                            <input type="number" class="form-control @error('harga') is-invalid @enderror"
                                   name="harga" id="harga" required autofocus value="{{ old('harga') }}">
                            <x-input-error :messages="$errors->get('jumlah')"/>
                        </div>

                        <!-- Jumlah -->
                        <div class="col-md-6 mb-1">
                            <x-input-label for="jumlah" :value="('Jumlah')"/>
                            <input type="number" class="form-control @error('jumlah') is-invalid @enderror"
                                   name="jumlah" id="jumlah" required autofocus value="{{ old('jumlah') }}">
                            <x-input-error :messages="$errors->get('jumlah')"/>
                        </div>

                        <!-- Total -->
                        <div class="col-md-6 mb-1">
                            <x-input-label for="total" :value="('Total')"/>
                            <input type="number" class="form-control @error('total') is-invalid @enderror"
                                   name="total" id="total" required autofocus value="{{ old('total') }}">
                            <x-input-error :messages="$errors->get('total')"/>
                        </div>

                        <!-- Bayar -->
                        <div class="col-md-6 mb-1">
                            <x-input-label for="bayar" :value="('Uang Bayar')"/>
                            <input type="number" class="form-control @error('bayar') is-invalid @enderror"
                                   name="bayar" id="bayar" required autofocus value="{{ old('bayar') }}">
                            <x-input-error :messages="$errors->get('bayar')"/>
                        </div>

                        <!-- Kembalian -->
                        <div class="col-md-6 mb-2">
                            <x-input-label for="kembalian" :value="('Kembalian')"/>
                            <input type="number" class="form-control @error('kembalian') is-invalid @enderror"
                                   name="kembalian" id="kembalian" required autofocus value="{{ old('kembalian') }}">
                            <x-input-error :messages="$errors->get('kembalian')"/>
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
