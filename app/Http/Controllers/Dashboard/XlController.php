<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Xl\XlStoreRequest;
use App\Http\Requests\Xl\XlUpdateRequest;
use App\Models\Xl;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class XlController extends Controller
{
    public function index(): View
    {
        $xl = Xl::with('user')
            ->orderBy('kategori', 'asc')
            ->get();

        return view('dashboard.xl.index', compact('xl'));
    }

    public function store(XlStoreRequest $request): RedirectResponse
    {
        $request->make();
        return back()->with('success', 'Data xl berhasil ditambah');
    }

    public function update(XlUpdateRequest $request): RedirectResponse
    {
        Xl::where('slug', $request->input('slug'))
            ->update($request->validated());

        return back()->with('success', 'Data xl berhasil diubah');
    }

    public function destroy(Xl $xl): RedirectResponse
    {
        if (Gate::allows('isOwner')) {
            Xl::destroy($xl->id);

            return back()->with('success', 'Data xl berhasil dihapus');
        }

        return back()->with('failed', 'Tidak memiliki akses!');
    }
}
