<x-app-layout>
    <x-container>
        <div class="card-body p-1">
            <div class="card-header">
                <h3 class="fw-semibold">Data Pemasukan</h3>
                <p>Data terakhir diperbarui {{ $pemasukan[0]->updated_at->isoFormat('D MMMM') }}</p>

                <button class="btn btn-dark btn-md rounded-4 mb-3" data-bs-toggle="modal" data-bs-target="#createModal">
                    <span data-feather="plus"></span>
                    Tambah Data
                </button>
            </div>

            <table class="table table-bordered table-hover pt-1 bord" id="table">
                <thead>
                <tr class="table-title">
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Jumlah</th>
                    <th>Total Bayar</th>
                    <th>Bayar</th>
                    <th>Kembalian</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 1 ?>
                @foreach ($pemasukan as $pemasukan)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{!! $pemasukan->created_at->isoFormat('D MMMM Y') !!}</td>
                        <td>{!! $pemasukan->nama !!}</td>
                        <td>{!! $pemasukan->kategori !!}</td>
                        <td>{!! $pemasukan->jumlah !!}</td>
                        <td>Rp. {!! $pemasukan->total !!}</td>
                        <td>Rp. {!! $pemasukan->bayar !!}</td>
                        <td>Rp. {!! $pemasukan->kembalian !!}</td>
                        <td>
                            <button class="btn btn-warning border-0 btn-sm rounded-3" data-bs-toggle="modal"
                                    data-bs-target="#edit" id="editModal"
                                    data-nama="{{ $pemasukan->nama }}"
                                    data-slug="{{ $pemasukan->slug }}"
                                    data-harga="{{ $pemasukan->harga }}"
                                    data-jumlah="{{ $pemasukan->jumlah }}"
                                    data-total="{{ $pemasukan->total }}"
                                    data-bayar="{{ $pemasukan->bayar }}"
                                    data-kembalian="{{ $pemasukan->kembalian }}">
                                <i data-feather="edit"></i>
                            </button>
                            @if(auth()->user()->role === 'owner')
                                <form action="{{ route('pemasukan.destroy', $pemasukan->slug) }}"
                                      method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <x-button-delete/>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        @include('dashboard.pemasukan.modal.create')
        @include('dashboard.pemasukan.modal.edit')
    </x-container>

    @section('script')
        <script src="{{ asset('js/pemasukan.js') }}"></script>
        <script src="{{ asset('js/keuntungan.js') }}"></script>
        <script>
            $(document).on("click", "#editModal", function () {
                let nama = $(this).data('nama');
                let slug = $(this).data('slug');
                let harga = $(this).data('harga');
                let jumlah = $(this).data('jumlah');
                let total = $(this).data('total');
                let bayar = $(this).data('bayar');
                let kembalian = $(this).data('kembalian');

                $(".modal-body #nama").val(nama);
                $(".modal-body #slug").val(slug);
                $(".modal-body #harga").val(harga);
                $(".modal-body #jumlah").val(jumlah);
                $(".modal-body #total").val(total);
                $(".modal-body #bayar").val(bayar);
                $(".modal-body #kembalian").val(kembalian);
            });
        </script>
    @endsection
</x-app-layout>
