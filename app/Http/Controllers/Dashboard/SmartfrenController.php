<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Smartfren\SmartfrenStoreRequest;
use App\Http\Requests\Smartfren\SmartfrenUpdateRequest;
use App\Models\Smartfren;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class SmartfrenController extends Controller
{
    public function index(): View
    {
        $smartfren = Smartfren::with('user')
            ->orderBy('kategori', 'asc')
            ->get();

        return view('dashboard.smartfren.index', compact('smartfren'));
    }

    public function store(SmartfrenStoreRequest $request): RedirectResponse
    {
        $request->make();
        return back()->with('success', 'Data smartfren berhasil ditambah');
    }

    public function update(SmartfrenUpdateRequest $request): RedirectResponse
    {
        Smartfren::where('slug', $request->input('slug'))
            ->update($request->validated());

        return back()->with('success', 'Data smartfren berhasil diubah');
    }

    public function destroy(Smartfren $smartfren): RedirectResponse
    {
        if (Gate::allows('isOwner')) {
            Smartfren::destroy($smartfren->id);

            return back()->with('success', 'Data smartfren berhasil dihapus');
        }

        return back()->with('failed', 'Tidak memiliki akses!');
    }
}
