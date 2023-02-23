<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $users = User::first()
                ->where('role', '=', 'employee')
                ->orWhere('role', '=', 'user')
                ->get();

        return view('dashboard.karyawan.index', compact('users'));
    }

    public function edit(User $user): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): RedirectResponse
    {
        if (Gate::allows('isOwner')) {
            User::destroy($user->id);

            return back()->with('success', 'Data berhasil dihapus');
        }

        return back()->with('failed', 'Kamu tidak memiliki akses!');
    }
}
