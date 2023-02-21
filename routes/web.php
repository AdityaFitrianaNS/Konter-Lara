<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dashboard\AksesorisController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware(['auth', 'verified', 'admin'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('dashboard')->group(function () {
    Route::get('/aksesoris', [AksesorisController::class, 'index'])->name('aksesoris.index');
    Route::post('/aksesoris/create', [AksesorisController::class, 'index'])->name('aksesoris.store');
    Route::put('/aksesoris/{aksesoris}', [AksesorisController::class, 'index'])->name('aksesoris.update');
    Route::delete('/aksesoris/{aksesoris}', [AksesorisController::class, 'index'])->name('aksesoris.destroy');
    Route::get('/aksesoris/{aksesori}/edit', [AksesorisController::class, 'index'])->name('aksesoris.edit');
    // Route::resource('/aksesoris', AksesorisController::class);
})->middleware(['auth', 'admin']);
