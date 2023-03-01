<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pemasukan\PemasukanStoreRequest;
use App\Http\Requests\Pemasukan\PemasukanUpdateRequest;
use App\Models\Pemasukan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class PemasukanController extends Controller
{
    public function index(): View
    {
        $pemasukan = Pemasukan::with('user')
            ->orderBy('kategori', 'asc')
            ->get();

        return view('dashboard.pemasukan.index', compact('pemasukan'));
    }

    public function store(PemasukanStoreRequest $request): RedirectResponse
    {
        $request->make();
        return back()->with('success', 'Data pemasukan berhasil ditambah');
    }

    public function update(PemasukanUpdateRequest $request): RedirectResponse
    {
        Pemasukan::where('slug', $request->input('slug'))
            ->update($request->validated());

        return back()->with('success', 'Data pemasukan berhasil diubah');
    }

    public function destroy(Pemasukan $pemasukan): RedirectResponse
    {
        if (Gate::allows('isOwner')) {
            Pemasukan::destroy($pemasukan->id);

            return back()->with('success', 'Data pemasukan berhasil dihapus');
        }

        return back()->with('failed', 'Tidak memiliki akses!');
    }
}
