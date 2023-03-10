<x-app-layout>
    <x-container>
        <div class="card-body p-1">
            <div class="card-header">
                <h3 class="fw-semibold">Data Smartfren</h3>
                <p>Data terakhir diperbarui {{ $smartfren[0]->updated_at->isoFormat('D MMMM') }}</p>

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
                @foreach ($smartfren as $smartfren)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{!! $smartfren->nama !!}</td>
                        <td>{!! $smartfren->masa_aktif !!}</td>
                        <td>{!! $smartfren->kategori !!}</td>
                        <td>{!! $smartfren->harga_asli !!}</td>
                        <td>{!! $smartfren->harga_jual !!}</td>
                        <td>{!! $smartfren->updated_at->isoFormat('D MMMM Y') !!}</td>
                        @if(auth()->user()->role === 'owner')
                            <td>
                                <button class="btn btn-warning border-0 btn-sm rounded-3" data-bs-toggle="modal"
                                        data-bs-target="#edit" id="editModal"
                                        data-id="{{ $smartfren->id }}"
                                        data-nama="{{ $smartfren->nama }}"
                                        data-slug="{{ $smartfren->slug }}"
                                        data-masa_aktif="{{ $smartfren->masa_aktif }}"
                                        data-harga_asli="{{ $smartfren->harga_asli }}"
                                        data-harga_jual="{{ $smartfren->harga_jual }}">
                                    <i data-feather="edit"></i>
                                </button>
                                <form action="{{ route('smartfren.destroy', $smartfren->slug) }}"
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
        @include('dashboard.smartfren.modal.create')
        @include('dashboard.smartfren.modal.edit')
    </x-container>

    @push('script')
        <script src="{{ asset('js/modal.js') }}"></script>
    @endpush
</x-app-layout>
