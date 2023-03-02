<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('plugins/datatables/datatables.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <!-- Sidebar -->
    <div class="wrapper">
        @include('layouts.sidebar')

        <!-- Navbar -->
        <div class="main">
            @include('layouts.navbar')

            <!-- Page Content -->
            <main class="content">
                {{ $slot }}
            </main>

            <!-- Footer -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-6 text-start">
                            <p class="mb-0">
                                <a class="text-muted" href="" target="_blank"><strong>Konter Lara</strong></a>
                            </p>
                        </div>
                        <div class="col-6 text-end">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a class="text-muted" href="" target="_blank">Support</a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="text-muted" href="" target="_blank">Help Center</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="{{ asset('plugins/jquery/jquery.js') }}"></script>
    <script src="{{ asset('plugins/datatables/datatables.js') }}"></script>
    <script src="{{ asset('plugins/toastr/toastr.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#table').DataTable();
        });

        @if(session()->has('success'))
            toastr.success('{{ session('success') }}')
        @elseif(session()->has('failed'))
            toastr.error('{{ session('failed') }}')
        @endif
    </script>
    @yield('script')
</body>
</html>
