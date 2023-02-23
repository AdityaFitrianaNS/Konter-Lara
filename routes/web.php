<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dashboard\AksesorisController;
use App\Http\Controllers\Dashboard\KaryawanController;
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
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware(['auth', 'admin'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('dashboard')->middleware(['auth', 'admin'])->group(function () {
    Route::controller(AksesorisController::class)->group(function (){
        Route::get('/aksesoris', 'index')->name('aksesoris.index');
        Route::post('/aksesoris/create', 'store')->name('aksesoris.store');
        Route::put('/aksesoris/{aksesoris}', 'update')->name('aksesoris.update');
        Route::delete('/aksesoris/{aksesoris:nama}', 'destroy')->name('aksesoris.destroy');
        Route::get('/aksesoris/{aksesoris:nama}/edit', 'edit')->name('aksesoris.edit');
    });

    Route::controller(KaryawanController::class)->group(function (){
        Route::get('/karyawan', 'index')->name('karyawan.index');
        Route::delete('/karyawan/{user:name}', 'destroy')->name('karyawan.destroy');
    });
});
