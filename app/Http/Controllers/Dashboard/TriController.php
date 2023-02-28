<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tri\TriStoreRequest;
use App\Http\Requests\Tri\TriUpdateRequest;
use App\Models\Tri;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class TriController extends Controller
{
    public function index(): View
    {
        $tri = Tri::with('user')
            ->orderBy('kategori', 'asc')
            ->get();

        return view('dashboard.tri.index', compact('tri'));
    }

    public function store(TriStoreRequest $request): RedirectResponse
    {
        $request->make();
        return back()->with('success', 'Data tri berhasil ditambah');
    }

    public function update(TriUpdateRequest $request): RedirectResponse
    {
        Tri::where('slug', $request->input('slug'))
            ->update($request->validated());

        return back()->with('success', 'Data tri berhasil diubah');
    }

    public function destroy(Tri $tri): RedirectResponse
    {
        if (Gate::allows('isOwner')) {
            Tri::destroy($tri->id);

            return back()->with('success', 'Data tri berhasil dihapus');
        }

        return back()->with('failed', 'Tidak memiliki akses!');
    }
}
