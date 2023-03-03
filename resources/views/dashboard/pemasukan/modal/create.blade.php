<!-- Modal -->
<div class="modal fade" id="createModal" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content rounded-5">
            <div class="modal-header">
                <h4 class="modal-title fw-semibold">
                    Tambah Data Pembeli
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('pemasukan.store') }}" method="POST">
                    @csrf
                    <div class="row g-2">
                        <!-- Nama -->
                        <div class="col-md-6">
                            <x-input-label for="nama" :value="('Nama Item')"/>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                   name="nama" required autofocus value="{{ old('nama') }}">
                            <x-input-error :messages="$errors->get('nama')"/>
                        </div>

                        <!-- Kategori -->
                        <div class="col-md-6">
                            <x-input-label for="kategori" :value="('Kategori')"/>
                            <select class="form-select @error('kategori') is-invalid @enderror"
                                    name="kategori" id="kategori" onchange="jumlahKeuntungan()">
                                @if (old('kategori'))
                                    <option value="{{ old('kategori') }}" selected>{{ old('kategori') }}</option>
                                    <option value="Aksesoris Handphone">Aksesoris Handphone</option>
                                    <option value="Paket Internet">Pulsa</option>
                                    <option value="Paket Internet">Paket Internet</option>
                                    <option value="Paket Telepon">Paket Telepon</option>
                                @else
                                    <option selected disabled>Pilih Kategori</option>
                                    <option value="Aksesoris Handphone">Aksesoris Handphone</option>
                                    <option value="Pulsa">Pulsa</option>
                                    <option value="Paket Internet">Paket Internet</option>
                                    <option value="Paket Telepon">Paket Telefon</option>
                                @endif
                            </select>
                            <x-input-error :messages="$errors->get('kategori')"/>
                        </div>

                        <!-- harga -->
                        <div class="col-md-6">
                            <x-input-label for="harga" :value="('Harga')"/>
                            <input type="number" class="form-control @error('harga') is-invalid @enderror"
                                   name="harga" id="harga" required autofocus value="{{ old('harga') }}">
                            <x-input-error :messages="$errors->get('jumlah')"/>
                        </div>

                        <!-- Jumlah -->
                        <div class="col-md-6">
                            <x-input-label for="jumlah" :value="('Jumlah')"/>
                            <input type="number" class="form-control @error('jumlah') is-invalid @enderror"
                                   name="jumlah" id="jumlah" required autofocus value="{{ old('jumlah') }}">
                            <x-input-error :messages="$errors->get('jumlah')"/>
                        </div>

                        <!-- Total -->
                        <div class=>
                            <x-input-label for="total" :value="('Total')"/>
                            <input type="number" class="form-control @error('total') is-invalid @enderror"
                                   name="total" id="total" required autofocus value="{{ old('total') }}">
                            <x-input-error :messages="$errors->get('total')"/>
                        </div>

                        <!-- Bayar -->
                        <div class="col-md-6">
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

                        <input type="number" hidden="hidden"
                               class="form-control @error('keuntungan') is-invalid @enderror"
                               name="keuntungan" id="keuntungan" required autofocus value="{{ old('keuntungan') }}">
                    </div>

                    <!-- Button -->
                    <x-button-save :value="('Simpan')"/>
                    <x-button-cancel :value="('Batal')"/>
                </form>
            </div>
        </div>
    </div>
</div>
