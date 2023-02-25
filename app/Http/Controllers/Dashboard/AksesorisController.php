<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AksesorisRequest;
use App\Models\Aksesoris;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class AksesorisController extends Controller
{
    public function index(): View
    {
        $aksesoris = Aksesoris::with('user')
            ->orderBy('kategori', 'asc')
            ->get();

        return view('dashboard.aksesoris.index', compact('aksesoris'));
    }

    public function store(AksesorisRequest $request): RedirectResponse
    {
        if (Gate::allows('isOwner')) {
            $request->make();
            return back()->with('success', 'Aksesoris berhasil ditambahkan');
        }

        return back()->with('failed', 'Tidak memiliki akses!');
    }

    public function update(AksesorisRequest $request): RedirectResponse
    {

        if (Gate::allows('isOwner')) {
            Aksesoris::where('slug', $request->input('slug'))
                ->update($request->rules());

            return back()->with('success', 'Data berhasil diubah');
        }

        return back()->with('failed', 'Tidak memiliki akses!');
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
