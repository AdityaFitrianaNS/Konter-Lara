<x-app-layout>
    <x-container>
        <div class="card-body p-1">
            <div class="card-header">
                <h3 class="fw-semibold">Data Pengeluaran</h3>
                <p>Data terakhir diperbarui {{ $pengeluaran[0]->updated_at->isoFormat('D MMMM') }}</p>

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
                    <th>Nama Item</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 1 ?>
                @foreach ($pengeluaran as $pengeluaran)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{!! $pengeluaran->created_at->isoFormat('D MMMM Y') !!}</td>
                        <td>{!! $pengeluaran->nama !!}</td>
                        <td>Rp. {!! $pengeluaran->harga !!}</td>
                        <td>{!! $pengeluaran->jumlah !!}</td>
                        <td>Rp. {!! $pengeluaran->total !!}</td>
                        <td>{!! $pengeluaran->keterangan !!}</td>
                        <td>
                            <button class="btn btn-warning border-0 btn-sm rounded-3" data-bs-toggle="modal"
                                    data-bs-target="#edit" id="editModal"
                                    data-nama="{{ $pengeluaran->nama }}"
                                    data-slug="{{ $pengeluaran->slug }}"
                                    data-harga="{{ $pengeluaran->harga }}"
                                    data-jumlah="{{ $pengeluaran->jumlah }}"
                                    data-total="{{ $pengeluaran->total }}"
                                    data-keterangan="{{ $pengeluaran->keterangan }}">
                                <i data-feather="edit"></i>
                            </button>
                            @if(auth()->user()->role === 'owner')
                                <form action="{{ route('pengeluaran.destroy', $pengeluaran->slug) }}"
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
        @include('dashboard.pengeluaran.modal.create')
        @include('dashboard.pengeluaran.modal.edit')
    </x-container>

    @section('script')
        <script>
            $(document).on("click", "#editModal", function () {
                let nama = $(this).data('nama');
                let slug = $(this).data('slug');
                let harga = $(this).data('harga');
                let jumlah = $(this).data('jumlah');
                let total = $(this).data('total');
                let keterangan = $(this).data('keterangan');

                $(".modal-body #nama").val(nama);
                $(".modal-body #slug").val(slug);
                $(".modal-body #harga").val(harga);
                $(".modal-body #jumlah").val(jumlah);
                $(".modal-body #total").val(total);
                $(".modal-body #keterangan").val(keterangan);
            });
        </script>
    @endsection
</x-app-layout>
