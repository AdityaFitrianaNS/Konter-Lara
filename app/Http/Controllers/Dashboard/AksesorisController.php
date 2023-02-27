<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Aksesoris;
use App\Http\Requests\Aksesoris\AksesorisStoreRequest;
use App\Http\Requests\Aksesoris\AksesorisUpdateRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AksesorisController extends Controller
{
    public function index(): View
    {
        $aksesoris = Aksesoris::with('user')
            ->orderBy('kategori', 'asc')
            ->get();

        return view('dashboard.aksesoris.index', compact('aksesoris'));
    }

    public function store(AksesorisStoreRequest $request): RedirectResponse
    {
        $request->make();
        return back()->with('success', 'Aksesoris berhasil ditambah');
    }

    public function update(AksesorisUpdateRequest $request): RedirectResponse
    {
        Aksesoris::where('slug', $request->input('slug'))
            ->update($request->validated());

        return back()->with('success', 'Data berhasil diubah');
    }

    public function destroy(Aksesoris $aksesoris): RedirectResponse
    {
        if (Gate::allows('isOwner')) {
            Aksesoris::destroy($aksesoris->id);

            return back()->with('success', 'Data berhasil dihapus');
        }

        return back()->with('failed', 'Tidak memiliki akses!');
    }
}
