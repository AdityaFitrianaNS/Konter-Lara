<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Telkomsel;
use App\Http\Requests\Telkomsel\TelkomselRequest;
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

    public function store(TelkomselRequest $request): RedirectResponse
    {
        $request->make();
        return back()->with('success', 'Data telkomsel berhasil ditambah');
    }

    public function update(TelkomselRequest $request): RedirectResponse
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
