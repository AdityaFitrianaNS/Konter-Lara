@extends('layouts.app')

@section('container')
    <x-container>
        <div class="row ">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header card-header-text">
                        <h4 class="card-title">Data Aksesoris</h4>
                        <p class="sub-text" style="margin-top: -10px;">
                            Last Update
                            {{-- Last update {{ $todolists[0]->due->format('d F, H:i') }} --}}
                        </p>
                        <button class="btn mt-2" data-bs-toggle="modal" data-bs-target="#modal_tambah" id="btn-add">
                            <i class="bi bi-clipboard-plus bi-action"></i>
                            Tambah Data
                        </button>
                        @include('dashboard.aksesoris.modal.create')
                    </div>

                    <div class="card-content table-responsive">
                        <div class="toast align-items-center" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="d-flex">
                                <div class="toast-body">
                                    Hello, world! This is a toast message.
                                </div>
                                <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                        </div>

                        <table class="table table-bordered table-hover pt-1 bord" id="example">
                            <thead class="text-white">
                            <tr class="table-title">
                                <th>Nama Aksesoris</th>
                                <th>Kategori</th>
                                <th>Harga Asli</th>
                                <th>Harga Jual</th>
                                <th>Diperbarui</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($aksesoris as $aksesoris)
                                <tr>
                                    <td style="height: 3px">{!! $aksesoris->nama_aksesoris !!}</td>
                                    <td>{!! $aksesoris->kategori !!}</td>
                                    <td>{!! $aksesoris->harga_asli !!}</td>
                                    <td>{!! $aksesoris->harga_jual !!}</td>
                                    <td>{!! $aksesoris->updated_at->format('d F Y, H:i') !!}</td>
                                    <td>
                                        <a href="/todolists//edit" class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil-square bi-action text-white"></i>
                                        </a>

                                        <form action="/konterku/dashboard/aksesoris/{{ $aksesoris->slug }}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger border-0 btn-sm" onclick="return confirm('Are you sure delete?')">
                                                <i class="bi bi-trash bi-action text-white"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </x-container>
@endsection
