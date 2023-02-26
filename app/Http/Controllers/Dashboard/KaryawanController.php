<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class KaryawanController extends Controller
{
    public function index(): View | RedirectResponse
    {
        $users = User::first()
                ->where('role', '=', 'employee')
                ->orWhere('role', '=', 'user')
                ->get();

        if (Gate::allows('isOwner')) {
            return view('dashboard.karyawan.index', compact('users'));
        }

        return back()->with('failed', 'Ups! Sepertinya ada yang tidak beres.');
    }

    public function update(Request $request): RedirectResponse
    {
        $validation = $request->validate([
            'role' => ['required', Rule::in(['employee', 'user'])]
        ]);

        if (Gate::allows('isOwner')) {
            User::where('email', $request->input('email'))
                ->update($validation);

            return back()->with('success', 'Data berhasil diubah');
        }

        return back()->with('failed', 'Ups! Sepertinya ada yang tidak beres.');
    }

    public function destroy(User $user): RedirectResponse
    {
        if (Gate::allows('isOwner')) {
            User::destroy($user->id);

            return back()->with('success', 'Data berhasil dihapus');
        }

        return back()->with('failed', 'Ups! Sepertinya ada yang tidak beres.');
    }
}
