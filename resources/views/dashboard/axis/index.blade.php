<x-app-layout>
    <x-container>
        <div class="card-body p-1">
            <div class="card-header">
                <h3 class="fw-semibold">Data Axis</h3>
                <p>Data terakhir diperbarui {{ $axis[0]->updated_at->isoFormat('D MMMM') }}</p>

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
                @foreach ($axis as $axis)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{!! $axis->nama !!}</td>
                        <td>{!! $axis->masa_aktif !!}</td>
                        <td>{!! $axis->kategori !!}</td>
                        <td>{!! $axis->harga_asli !!}</td>
                        <td>{!! $axis->harga_jual !!}</td>
                        <td>{!! $axis->updated_at->isoFormat('D MMMM Y') !!}</td>
                        @if(auth()->user()->role === 'owner')
                            <td>
                                <button class="btn btn-warning border-0 btn-sm rounded-3" data-bs-toggle="modal"
                                        data-bs-target="#edit" id="editModal"
                                        data-id="{{ $axis->id }}"
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
                                    <x-button-delete/>
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

    @push('script')
        <script src="{{ asset('js/modal.js') }}"></script>
    @endpush
</x-app-layout>
