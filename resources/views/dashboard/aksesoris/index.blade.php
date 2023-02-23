<x-app-layout>
    <x-container>
        <div class="card-body p-1">
            <div class="card-header">
                <h2 class="fw-semibold">Data Aksesoris</h2>
                <p class="">Data diperbarui {{ $aksesoris[0]->updated_at->format('d F, H:i') }}</p>

                @if(Auth::user()->role === 'owner')
                    <button class="btn btn-dark btn-md rounded-4 mb-3" data-bs-toggle="modal" data-bs-target="#modal_tambah" id="btn-add">
                        Tambah Data
                    </button>

                    @include('dashboard.aksesoris.modal.create')
                @endif
            </div>

            <table class="table table-bordered table-hover pt-1 bord" id="aksesoris">
                <thead>
                    <tr class="table-title">
                        <th>No</th>
                        <th>Nama Aksesoris</th>
                        <th>Merk</th>
                        <th>Kategori</th>
                        <th>Harga Asli</th>
                        <th>Harga Jual</th>
                        <th>Diperbarui</th>
                        <th>Aksi</th>
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
                        <td>
                            <a href="/aksesoris/{{ $aksesoris->nama }}/edit" class="btn btn-warning border-0 btn-sm rounded-3">
                                <i data-feather="edit"></i>
                            </a>

                            <form action="{{ route('aksesoris.destroy', $aksesoris->nama) }}"
                                  method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger border-0 btn-sm rounded-2"
                                        onclick="return confirm('Are you sure delete?')">
                                    <span data-feather="trash-2"> </span>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </x-container>

    @section('script')
        <script>
            $(document).ready(function () {
                $('#aksesoris').DataTable();
            });
        </script>
    @endsection
</x-app-layout>
