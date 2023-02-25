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
                            <button class="btn btn-warning border-0 btn-sm rounded-3" data-bs-toggle="modal"
                                    data-bs-target="#edit" id="editModal"
                                    data-role = "{{ $user->role }}"
                                    data-email = "{{ $user->email }}">
                                <i data-feather="edit"></i>
                            </button>

                            <form action="{{ route('karyawan.destroy', $user->email) }}"
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
        @include('dashboard.karyawan.modal.edit')
    </x-container>

    @section('script')
        <script>
            $(document).on("click", "#editModal", function() {
                let role = $(this).data('role');
                let email = $(this).data('email');

                $(".modal-body #role").val(role);
                $(".modal-body #email").val(email);
            });
        </script>
    @endsection
</x-app-layout>
