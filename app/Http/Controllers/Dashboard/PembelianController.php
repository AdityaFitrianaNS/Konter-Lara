<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Pembelian;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PembelianController extends Controller
{
    public function index(): View
    {
        $pembelian = Pembelian::with('user')
            ->orderBy('kategori', 'asc')
            ->get();

        return view('dashboard.pembelian.index', compact('pembelian'));
    }

    public function store(Request $request): RedirectResponse
    {
        //
    }

    public function update(Request $request, Pembelian $pembelian): RedirectResponse
    {
        //
    }

    public function destroy(Pembelian $pembelian): RedirectResponse
    {
        //
    }
}
