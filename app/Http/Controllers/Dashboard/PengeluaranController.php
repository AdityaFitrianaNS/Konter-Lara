<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pengeluaran\PengeluaranRequest;
use App\Models\Pengeluaran;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $pengeluaran = Pengeluaran::with('user')
            ->first()
            ->get();

        return view('dashboard.pengeluaran.index', compact('pengeluaran'));
    }

    public function store(PengeluaranRequest $request): RedirectResponse
    {
        $request->make();
        return back()->with('success', 'Data pengeluaran berhasil ditambah');
    }

    public function update(PengeluaranRequest $request): RedirectResponse
    {
        Pengeluaran::where('slug', $request->input('slug'))
            ->update($request->validated());

        return back()->with('success', 'Data pemasukan berhasil diubah');
    }

    public function destroy(Pengeluaran $pengeluaran): RedirectResponse
    {
        if (Gate::allows('isOwner')) {
            Pengeluaran::destroy($pengeluaran->id);

            return back()->with('success', 'Data pemasukan berhasil dihapus');
        }

        return back()->with('failed', 'Tidak memiliki akses!');
    }
}
