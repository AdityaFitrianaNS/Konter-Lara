<select class="form-select @error('kategori') is-invalid @enderror" name="kategori">
    @if (old('kategori'))
        <option value="{{ old('kategori') }}" selected>{{ old('kategori') }}</option>
        <option value="Pulsa">Pulsa</option>
        <option value="Paket Internet">Paket Internet</option>
        <option value="Paket Telepon">Paket Telepon</option>
    @else
        <option selected disabled>Pilih Kategori</option>
        <option value="Pulsa">Pulsa</option>
        <option value="Paket Internet">Paket Internet</option>
        <option value="Paket Telepon">Paket Telepon</option>
    @endif
</select>
