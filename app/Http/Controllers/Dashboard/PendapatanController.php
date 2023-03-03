<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pemasukan;
use Illuminate\View\View;

class PendapatanController extends Controller
{
    public function __invoke(Request $request): View
    {
        $pendapatan = Pemasukan::with('user')
            ->select('keuntungan', 'created_at', 'updated_at')
            ->get();

        return view('dashboard.pendapatan.index', compact('pendapatan'));
    }
}
