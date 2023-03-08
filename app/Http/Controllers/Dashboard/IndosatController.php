<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Indosat;
use App\Http\Requests\Indosat\IndosatRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class IndosatController extends Controller
{
    public function index(): View
    {
        $indosat = Indosat::with('user')
            ->orderBy('kategori', 'asc')
            ->get();

        return view('dashboard.indosat.index', compact('indosat'));
    }

    public function store(IndosatRequest $request): RedirectResponse
    {
        $request->make();
        return back()->with('success', 'Data indosat berhasil ditambah');
    }

    public function update(IndosatRequest $request): RedirectResponse
    {
        Indosat::where('slug', $request->input('slug'))
            ->update($request->validated());

        return back()->with('success', 'Data indosat berhasil diubah');
    }

    public function destroy(Indosat $indosat): RedirectResponse
    {
        if (Gate::allows('isOwner')) {
            Indosat::destroy($indosat->id);

            return back()->with('success', 'Data indosat berhasil dihapus');
        }

        return back()->with('failed', 'Tidak memiliki akses!');
    }
}
