<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Axis;
use App\Http\Requests\Axis\AxisRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class AxisController extends Controller
{
    public function index(): View
    {
        $axis = Axis::with('user')
            ->orderBy('kategori', 'asc')
            ->get();

        return view('dashboard.axis.index', compact('axis'));
    }

    public function store(AxisRequest $request): RedirectResponse
    {
        $request->make();
        return back()->with('success', 'Data axis berhasil ditambah');
    }

    public function update(AxisRequest $request): RedirectResponse
    {
        Axis::where('slug', $request->input('slug'))
            ->update($request->validated());

        return back()->with('success', 'Data axis berhasil diubah');
    }

    public function destroy(Axis $axis): RedirectResponse
    {
        if (Gate::allows('isOwner')) {
            Axis::destroy($axis->id);

            return back()->with('success', 'Data axis berhasil dihapus');
        }

        return back()->with('failed', 'Tidak memiliki akses!');
    }
}
