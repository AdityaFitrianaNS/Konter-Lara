<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Aksesoris;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AksesorisController extends Controller
{
    public function index(): View
    {
        $aksesoris = Aksesoris::with('user')
            ->orderBy('kategori', 'asc')
            ->get();

        return view('dashboard.aksesoris.index', compact('aksesoris'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validation = $request->validate([
            'nama' => ['required', 'min:5', 'max:50', 'unique:aksesoris'],
            'slug' => ['required', 'min:5', 'max:50', 'unique:aksesoris'],
            'merk' => ['required', 'min:5', 'max:50'],
            'kategori' => ['required', 'min:5', 'max:50'],
            'harga_asli' => ['required', 'max:11'],
            'harga_jual' => ['required', 'max:11'],
        ]);

        $validation['slug'] = strtolower(str_replace(' ', '-', $request->input('nama')));
        $validation['user_id'] = auth()->user()->id;

        if (Gate::allows('isOwner')) {
            Aksesoris::create($validation);

            return back()->with('success', 'Aksesoris berhasil ditambahkan');
        }

        return back()->with('failed', 'Tidak memiliki akses!');

    }

    public function update(Request $request, Aksesoris $aksesoris): RedirectResponse
    {
        $validation = $request->validate([
            'nama' => ['required', 'min:5', 'max:50', 'unique:aksesoris'],
            'merk' => ['required', 'min:5', 'max:50'],
            'kategori' => ['required', 'min:5', 'max:50'],
            'harga_asli' => ['required', 'max:11'],
            'harga_jual' => ['required', 'max:11'],
        ]);

        $validation['slug'] = strtolower(str_replace(' ', '-', $request->input('nama')));
        $validation['user_id'] = auth()->user()->id;

        if (Gate::allows('isOwner')) {
            Aksesoris::where('slug', $request->input('slug'))
                    ->update($validation);

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
