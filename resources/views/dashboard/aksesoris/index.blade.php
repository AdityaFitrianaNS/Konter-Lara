<x-app-layout>
    <x-container>
        <div class="card-body p-1">
            <div class="card-header">
                <h2 class="fw-semibold">Data Aksesoris</h2>
                <p>Data diperbarui {{ $aksesoris[0]->updated_at->format('d F, H:i') }}</p>

                @if(Auth::user()->role === 'owner')
                    <button class="btn btn-dark btn-md rounded-4 mb-3" data-bs-toggle="modal"
                            data-bs-target="#createModal">
                        <span data-feather="plus"></span>
                        Tambah Data
                    </button>
                @endif
            </div>

            <table class="table table-bordered table-hover pt-1 bord" id="table">
                <thead>
                    <tr class="table-title">
                        <th>No</th>
                        <th>Nama Aksesoris</th>
                        <th>Merk</th>
                        <th>Kategori</th>
                        <th>Harga Asli</th>
                        <th>Harga Jual</th>
                        <th>Diperbarui</th>
                        @if(auth()->user()->role === 'owner')
                            <th>Aksi</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                <?php $i = 1 ?>
                @foreach ($aksesoris as $aksesoris)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{!! $aksesoris->nama !!}</td>
                        <td>{!! $aksesoris->merk !!}</td>
                        <td>{!! $aksesoris->kategori !!}</td>
                        <td>{!! $aksesoris->harga_asli !!}</td>
                        <td>{!! $aksesoris->harga_jual !!}</td>
                        <td>{!! $aksesoris->updated_at->format('d F') !!}</td>
                        @if(auth()->user()->role === 'owner')
                            <td>
                                <button class="btn btn-warning border-0 btn-sm rounded-3" data-bs-toggle="modal"
                                        data-bs-target="#edit" id="editModal"
                                        data-nama="{{ $aksesoris->nama }}"
                                        data-slug="{{ $aksesoris->slug }}"
                                        data-merk="{{ $aksesoris->merk }}"
                                        data-kategori="{{ $aksesoris->kategori }}"
                                        data-harga_asli="{{ $aksesoris->harga_asli }}"
                                        data-harga_jual="{{ $aksesoris->harga_jual }}">
                                    <i data-feather="edit"></i>
                                </button>
                                <form action="{{ route('aksesoris.destroy', $aksesoris->slug) }}"
                                      method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger border-0 btn-sm rounded-2"
                                            onclick="return confirm('Are you sure delete?')">
                                        <span data-feather="trash-2"> </span>
                                    </button>
                                </form>
                            </td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        @include('dashboard.aksesoris.modal.create')
        @include('dashboard.aksesoris.modal.edit')
    </x-container>

    @section('script')
        <script>
            $(document).on("click", "#editModal", function () {
                let nama = $(this).data('nama');
                let slug = $(this).data('slug');
                let merk = $(this).data('merk');
                let kategori = $(this).data('kategori');
                let harga_asli = $(this).data('harga_asli');
                let harga_jual = $(this).data('harga_jual');

                $(".modal-body #nama").val(nama);
                $(".modal-body #slug").val(slug);
                $(".modal-body #merk").val(merk);
                $(".modal-body #kategori").val(kategori);
                $(".modal-body #harga_asli").val(harga_asli);
                $(".modal-body #harga_jual").val(harga_jual);
            });
        </script>
    @endsection
</x-app-layout>
