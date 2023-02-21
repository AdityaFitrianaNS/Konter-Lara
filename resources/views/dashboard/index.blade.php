@extends('layouts.app')

@section('container')
    <x-container>
        <h1 class="h3 mb-3"><strong>Analytics</strong> Dashboard</h1>
        <div class="row">
            <div class="col-xl-12 col-xxl-12 d-flex">
                <div class="w-100">
                    <div class="row">
                        <x-card>
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Pendapatan</h5>
                                </div>

                                <div class="col-auto">
                                    <div class="stat text-primary">
                                        <i class="align-middle" data-feather="dollar-sign"></i>
                                    </div>
                                </div>
                            </div>

                            <h2 class="mb-3">Rp. 300.000</h2>
                            <div class="mb-0">
                                <span class="text-muted">Pada bulan,
                                    <span id="pendapatan"></span>
                                </span>
                            </div>
                        </x-card>

                        <x-card>
                            <div class="row">
                                <div class="col mt-0">
                                    <h4 class="card-title">Pemasukan</h4>
                                </div>

                                <div class="col-auto">
                                    <div class="stat text-white bg-success">
                                        <i class="align-middle" data-feather="arrow-down-circle"></i>
                                    </div>
                                </div>
                            </div>

                            <h2 class="mb-3">Rp. 1.000.000</h2>
                            <div class="mb-0">
                                <span class="text-muted">Pada tanggal,
                                    <span id="pemasukan"></span>
                                </span>
                            </div>
                        </x-card>

                        <x-card>
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Pengeluaran</h5>
                                </div>

                                <div class="col-auto">
                                    <div class="stat bg-danger text-white">
                                        <i class="align-middle" data-feather="arrow-up-circle"></i>
                                    </div>
                                </div>
                            </div>

                            <h2 class="mb-3">RP. 14.000</h2>
                            <div class="mb-0">
                                <span class="text-muted">Pada tanggal,
                                    <span id="pengeluaran"></span>
                                </span>
                            </div>
                        </x-card>
                    </div>
                </div>
            </div>
        </div>

        <div class="card flex-fill rounded-4 w-100">
            <div class="card-header rounded-4">
                <h5 class="card-title mb-0">Grafik Pendapatan</h5>
            </div>
            <div class="card-body py-3">
                <div class="chart chart-sm">
                    <canvas id="chartjs-dashboard-line"></canvas>
                </div>
            </div>
        </div>
    </x-container>
    @section('script')
        <script src="{{ asset('js/date.js') }}"></script>
        <script src="{{ asset('js/chart.js') }}"></script>
    @endsection
@endsection
