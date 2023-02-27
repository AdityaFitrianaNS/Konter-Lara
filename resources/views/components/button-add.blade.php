@if(auth()->user()->role === 'owner')
    <button class="btn btn-dark btn-md rounded-4 mb-3" data-bs-toggle="modal"
            data-bs-target="#createModal">
        <span data-feather="plus"></span>
        Tambah Data
    </button>
@endif
