<x-app-layout>
    <x-container>
        <div class="card-body p-1">
            <div class="card-header">
                <h2 class="fw-semibold">Data Axis</h2>
                <p>Data diperbarui {{ $axis[0]->updated_at->format('d F, H:i') }}</p>

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
                        <th>Nama</th>
                        <th>Masa Aktif</th>
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
                @foreach ($axis as $axis)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{!! $axis->nama !!}</td>
                        <td>{!! $axis->masa_aktif !!}</td>
                        <td>{!! $axis->kategori !!}</td>
                        <td>{!! $axis->harga_asli !!}</td>
                        <td>{!! $axis->harga_jual !!}</td>
                        <td>{!! $axis->updated_at->format('d F') !!}</td>
                        @if(auth()->user()->role === 'owner')
                            <td>
                                <button class="btn btn-warning border-0 btn-sm rounded-3" data-bs-toggle="modal"
                                        data-bs-target="#edit" id="editModal"
                                        data-nama="{{ $axis->nama }}"
                                        data-slug="{{ $axis->slug }}"
                                        data-masa_aktif="{{ $axis->masa_aktif }}"
                                        data-harga_asli="{{ $axis->harga_asli }}"
                                        data-harga_jual="{{ $axis->harga_jual }}">
                                    <i data-feather="edit"></i>
                                </button>
                                <form action="{{ route('axis.destroy', $axis->slug) }}"
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
        @include('dashboard.axis.modal.create')
        @include('dashboard.axis.modal.edit')
    </x-container>

    @section('script')
        <script>
            $(document).on("click", "#editModal", function () {
                let nama = $(this).data('nama');
                let slug = $(this).data('slug');
                let masa_aktif = $(this).data('masa_aktif');
                let harga_asli = $(this).data('harga_asli');
                let harga_jual = $(this).data('harga_jual');

                $(".modal-body #nama").val(nama);
                $(".modal-body #slug").val(slug);
                $(".modal-body #masa_aktif").val(masa_aktif);
                $(".modal-body #harga_asli").val(harga_asli);
                $(".modal-body #harga_jual").val(harga_jual);
            });
        </script>
    @endsection
</x-app-layout>
