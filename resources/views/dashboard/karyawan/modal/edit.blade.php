<!-- Modal -->
<div class="modal fade" id="edit" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content rounded-4">
            <div class="modal-header">
                <h4 class="modal-title fw-semibold">
                    Ubah Role
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('karyawan.update') }}" method="POST">
                    @method("PUT")
                    @csrf
                    <!-- Role Karyawan -->
                    <div class="mb-2">
                        <label for="role" class="form-label fw-semibold">Jenis Role</label>
                        <select class="form-select @error('role') is-invalid @enderror" name="role">
                            <option selected disabled>Pilih Role</option>
                            <option value="employee">Karyawan</option>
                            <option value="user">User</option>
                        </select>

                        <input type="hidden" name="email" id="email">

                        @error('role')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Button -->
                    <x-button-save :value="('Simpan')"/>
                    <x-button-cancel :value="('Batal')"/>
                </form>
            </div>
        </div>
    </div>
</div>
