<x-app-layout>
    <x-container>
        <div class="card-body p-1">
            <div class="card-header pb-2">
                <h2 class="fw-semibold">Data Karyawan</h2>
                <p>Diperbarui pada {{ $users[0]->updated_at->format('d F, H:i') }}</p>
            </div>

            <table class="table table-bordered table-hover pt-1 bord" id="table">
                <thead>
                <tr class="table-title">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Tanggal Dibuat</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 1 ?>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{!! $user->name !!}</td>
                        <td>{!! $user->email !!}</td>
                        <td>{!! $user->created_at->format('d F') !!}</td>
                        <td>{!! $user->role !!}</td>
                        <td>
                            <a href="/karyawan/{{ $user->nama }}/edit"
                               class="btn btn-warning border-0 btn-sm rounded-3">
                                <i data-feather="edit"></i>
                            </a>

                            <form action="{{ route('karyawan.destroy', $user->name) }}"
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
</x-app-layout>
