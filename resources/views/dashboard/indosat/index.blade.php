<x-app-layout>
    <x-container>
        <div class="card-body p-1">
            <div class="card-header">
                <h3 class="fw-semibold">Data Indosat</h3>
                <p>Data terakhir diperbarui {{ $indosat[0]->updated_at->isoFormat('D MMMM') }}</p>

                <button class="btn btn-dark btn-md rounded-4 mb-3" data-bs-toggle="modal" data-bs-target="#createModal">
                    <span data-feather="plus"></span>
                    Tambah Data
                </button>
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
                @foreach ($indosat as $indosat)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{!! $indosat->nama !!}</td>
                        <td>{!! $indosat->masa_aktif !!}</td>
                        <td>{!! $indosat->kategori !!}</td>
                        <td>{!! $indosat->harga_asli !!}</td>
                        <td>{!! $indosat->harga_jual !!}</td>
                        <td>{!! $indosat->updated_at->isoFormat('D MMMM Y') !!}</td>
                        @if(auth()->user()->role === 'owner')
                            <td>
                                <button class="btn btn-warning border-0 btn-sm rounded-3" data-bs-toggle="modal"
                                        data-bs-target="#edit" id="editModal"
                                        data-id="{{ $indosat->id }}"
                                        data-nama="{{ $indosat->nama }}"
                                        data-slug="{{ $indosat->slug }}"
                                        data-masa_aktif="{{ $indosat->masa_aktif }}"
                                        data-harga_asli="{{ $indosat->harga_asli }}"
                                        data-harga_jual="{{ $indosat->harga_jual }}">
                                    <i data-feather="edit"></i>
                                </button>
                                <form action="{{ route('indosat.destroy', $indosat->slug) }}"
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
        @include('dashboard.indosat.modal.create')
        @include('dashboard.indosat.modal.edit')
    </x-container>

    @push('script')
        <script src="{{ asset('js/modal.js') }}"></script>
    @endpush
</x-app-layout>
