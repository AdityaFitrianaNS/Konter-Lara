<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Aksesoris;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AksesorisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $aksesoris = Aksesoris::first()
                    ->where('user_id', Auth::user()->id)
                    ->get();

        return view('dashboard.aksesoris.index', compact('aksesoris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {

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

        Aksesoris::create($validation);

        return redirect(route('aksesoris.index'))->with('success', 'Aksesoris berhasil ditambahkan');
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
        //
    }
}
