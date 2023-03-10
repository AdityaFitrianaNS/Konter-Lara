<x-app-layout>
    <x-container>
        <div class="card-body p-1">
            <div class="card-header">
                <h3 class="fw-semibold">Data Telkomsel</h3>
                <p>Data terakhir diperbarui {{ $telkomsel[0]->updated_at->isoFormat('D MMMM') }}</p>

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
                @foreach ($telkomsel as $telkomsel)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{!! $telkomsel->nama !!}</td>
                        <td>{!! $telkomsel->masa_aktif !!}</td>
                        <td>{!! $telkomsel->kategori !!}</td>
                        <td>{!! $telkomsel->harga_asli !!}</td>
                        <td>{!! $telkomsel->harga_jual !!}</td>
                        <td>{!! $telkomsel->updated_at->isoFormat('D MMMM Y') !!}</td>
                        @if(auth()->user()->role === 'owner')
                            <td>
                                <button class="btn btn-warning border-0 btn-sm rounded-3" data-bs-toggle="modal"
                                        data-bs-target="#edit" id="editModal"
                                        data-id="{{ $telkomsel->id }}"
                                        data-nama="{{ $telkomsel->nama }}"
                                        data-slug="{{ $telkomsel->slug }}"
                                        data-masa_aktif="{{ $telkomsel->masa_aktif }}"
                                        data-harga_asli="{{ $telkomsel->harga_asli }}"
                                        data-harga_jual="{{ $telkomsel->harga_jual }}">
                                    <i data-feather="edit"></i>
                                </button>
                                <form action="{{ route('telkomsel.destroy', $telkomsel->slug) }}"
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
        @include('dashboard.telkomsel.modal.create')
        @include('dashboard.telkomsel.modal.edit')
    </x-container>

    @push('script')
        <script src="{{ asset('js/modal.js') }}"></script>
    @endpush
</x-app-layout>
