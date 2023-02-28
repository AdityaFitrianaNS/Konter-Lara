<x-app-layout>
    <x-container>
        <div class="card-body p-1">
            <div class="card-header">
                <h2 class="fw-semibold">Data Pembelian</h2>
                <p>Data diperbarui {{ $pembelian[0]->updated_at->format('d F, H:i') }}</p>

                <x-button-add/>
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
                @foreach ($pembelian as $pembelian)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{!! $pembelian->created_at->format('d F') !!}</td>
                        <td>{!! $pembelian->nama !!}</td>
                        <td>{!! $pembelian->kategori !!}</td>
                        <td>{!! $pembelian->jumlah !!}</td>
                        <td>{!! $pembelian->total !!}</td>
                        <td>{!! $pembelian->bayar !!}</td>
                        <td>{!! $pembelian->kembalian !!}</td>
                        <td>
                            <button class="btn btn-warning border-0 btn-sm rounded-3" data-bs-toggle="modal"
                                    data-bs-target="#edit" id="editModal"
                                    data-nama="{{ $pembelian->nama }}"
                                    data-slug="{{ $pembelian->slug }}"
                                    data-kategori="{{ $pembelian->kategori }}"
                                    data-jumlah="{{ $pembelian->jumlah }}"
                                    data-total="{{ $pembelian->total }}"
                                    data-bayar="{{ $pembelian->bayar }}"
                                    data-kembalian="{{ $pembelian->kembalian }}">
                                <i data-feather="edit"></i>
                            </button>
                            @if(auth()->user()->role === 'owner')
                                <form action="{{ route('pembelian.destroy', $pembelian->slug) }}"
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
        @include('$dashboard.pembelian.modal.create')
        @include('$dashboard.pembelian.modal.edit')
    </x-container>

    @section('script')
        <script>
            $(document).on("click", "#editModal", function () {
                let nama = $(this).data('nama');
                let slug = $(this).data('slug');
                let kategori = $(this).data('kategori');
                let jumlah = $(this).data('jumlah');
                let total = $(this).data('total');
                let bayar = $(this).data('bayar');
                let kembalian = $(this).data('kembalian');

                $(".modal-body #nama").val(nama);
                $(".modal-body #slug").val(slug);
                $(".modal-body #kategori").val(kategori);
                $(".modal-body #jumlah").val(jumlah);
                $(".modal-body #total").val(total);
                $(".modal-body #bayar").val(bayar);
                $(".modal-body #kembalian").val(kembalian);
            });
        </script>
    @endsection
</x-app-layout>
