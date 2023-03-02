<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{

    public function __invoke(Request $request): View
    {
        $pemasukan = Pemasukan::with('user')
                ->sum('total');

        $pendapatan = Pemasukan::with('user')
            ->sum('keuntungan');

        $pengeluaran = Pengeluaran::with('user')
            ->sum('total');

        return view('dashboard.index', compact('pemasukan', 'pendapatan', 'pengeluaran'));
    }
}
