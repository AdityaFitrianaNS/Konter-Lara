<x-app-layout>
    <x-container>
        <div class="card-body p-1">
            <div class="card-header">
                <h3 class="fw-semibold">Data Pendapatan</h3>
                <p>Data terakhir diperbarui {{ $pendapatan[0]->updated_at->isoFormat('D MMMM') }}</p>

                <x-button-add/>
            </div>

            <table class="table table-bordered table-hover pt-1 bord" id="table">
                <thead>
                <tr class="table-title">
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Pemasukan</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 1 ?>
                @foreach ($pendapatan as $pendapatan)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{!! $pendapatan->created_at->isoFormat('D MMMM Y') !!}</td>
                        <td>{!! $pendapatan->keuntungan !!}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </x-container>
</x-app-layout>
