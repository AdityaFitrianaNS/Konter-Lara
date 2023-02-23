<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Aksesoris;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AksesorisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $aksesoris = Aksesoris::with('user')
            ->orderBy('kategori', 'asc')
            ->get();

        return view('dashboard.aksesoris.index', compact('aksesoris'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validation = $request->validate([
            'nama' => ['required', 'min:5', 'max:50', 'unique:aksesoris'],
            'merk' => ['required', 'min:5', 'max:50'],
            'kategori' => ['required', 'min:5', 'max:50'],
            'harga_asli' => ['required', 'max:11'],
            'harga_jual' => ['required', 'max:11'],
        ]);

        $validation['user_id'] = auth()->user()->id;

        if (Gate::allows('isOwner')) {
            Aksesoris::create($validation);

            return redirect(route('aksesoris.index'))->with('success', 'Aksesoris berhasil ditambahkan');
        }

        return back()->with('failed', 'Kamu tidak memiliki akses!');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Aksesoris $aksesoris): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Aksesoris $aksesoris): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aksesoris $aksesoris): RedirectResponse
    {
        if (Gate::allows('isAdmin')) {

            Aksesoris::destroy($aksesoris->id);
            return back()->with('success', 'Data berhasil dihapus');
        }
        return back()->with('failed', 'Kamu tidak memiliki akses!');
    }
}
