<x-app-layout>
    <x-container>
        <div class="card-body p-1">
            <div class="card-header">
                <h2 class="fw-semibold">Data Xl Axiata</h2>
                <p>Data diperbarui {{ $xl[0]->updated_at->format('d F, H:i') }}</p>

                <x-button-add/>
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
                @foreach ($xl as $xl)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{!! $xl->nama !!}</td>
                        <td>{!! $xl->masa_aktif !!}</td>
                        <td>{!! $xl->kategori !!}</td>
                        <td>{!! $xl->harga_asli !!}</td>
                        <td>{!! $xl->harga_jual !!}</td>
                        <td>{!! $xl->updated_at->format('d F') !!}</td>
                        @if(auth()->user()->role === 'owner')
                            <td>
                                <button class="btn btn-warning border-0 btn-sm rounded-3" data-bs-toggle="modal"
                                        data-bs-target="#edit" id="editModal"
                                        data-nama="{{ $xl->nama }}"
                                        data-slug="{{ $xl->slug }}"
                                        data-masa_aktif="{{ $xl->masa_aktif }}"
                                        data-harga_asli="{{ $xl->harga_asli }}"
                                        data-harga_jual="{{ $xl->harga_jual }}">
                                    <i data-feather="edit"></i>
                                </button>
                                <form action="{{ route('xl.destroy', $xl->slug) }}"
                                      method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <x-button-delete/>
                                </form>
                            </td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        @include('dashboard.xl.modal.create')
        @include('dashboard.xl.modal.edit')
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
