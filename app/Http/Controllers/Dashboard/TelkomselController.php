<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Telkomsel\TelkomselStoreRequest;
use App\Http\Requests\Telkomsel\TelkomselUpdateRequest;
use App\Models\Telkomsel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class TelkomselController extends Controller
{
    public function index(): View
    {
        $telkomsel = Telkomsel::with('user')
            ->orderBy('kategori', 'asc')
            ->get();

        return view('dashboard.telkomsel.index', compact('telkomsel'));
    }

    public function store(TelkomselStoreRequest $request): RedirectResponse
    {
        $request->make();
        return back()->with('success', 'Data telkomsel berhasil ditambah');
    }

    public function update(TelkomselUpdateRequest $request): RedirectResponse
    {
        Telkomsel::where('slug', $request->input('slug'))
            ->update($request->validated());

        return back()->with('success', 'Data telkomsel berhasil diubah');
    }

    public function destroy(Telkomsel $telkomsel): RedirectResponse
    {
        if (Gate::allows('isOwner')) {
            Telkomsel::destroy($telkomsel->id);

            return back()->with('success', 'Data telkomsel berhasil dihapus');
        }

        return back()->with('failed', 'Tidak memiliki akses!');
    }
}
