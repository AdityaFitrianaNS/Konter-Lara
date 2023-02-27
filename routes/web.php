<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dashboard\AksesorisController;
use App\Http\Controllers\Dashboard\AxisController;
use App\Http\Controllers\Dashboard\IndosatController;
use App\Http\Controllers\Dashboard\SmartfrenController;
use App\Http\Controllers\Dashboard\TelkomselController;
use App\Http\Controllers\Dashboard\KaryawanController;

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('auth.login');
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
        Route::get('/aksesoris', 'index')->name('aksesoris');
        Route::post('/aksesoris/store', 'store')->name('aksesoris.store');
        Route::put('/aksesoris/update', 'update')->name('aksesoris.update');
        Route::delete('/aksesoris/{aksesoris}', 'destroy')->name('aksesoris.destroy');
    });

   Route::controller(AxisController::class)->group(function (){
      Route::get('/axis', 'index')->name('axis');
      Route::post('/axis/store', 'store')->name('axis.store');
      Route::put('/axis/update', 'update')->name('axis.update');
      Route::delete('/axis/{axis}', 'destroy')->name('axis.destroy');
    });

    Route::controller(IndosatController::class)->group(function (){
        Route::get('/indosat', 'index')->name('indosat');
        Route::post('/indosat/store', 'store')->name('indosat.store');
        Route::put('/indosat/update', 'update')->name('indosat.update');
        Route::delete('/indosat/{indosat}', 'destroy')->name('indosat.destroy');
    });
    
    Route::controller(SmartfrenController::class)->group(function (){
        Route::get('/smartfren', 'index')->name('smartfren');
        Route::post('/smartfren/store', 'store')->name('smartfren.store');
        Route::put('/smartfren/update', 'update')->name('smartfren.update');
        Route::delete('/smartfren/{smartfren}', 'destroy')->name('smartfren.destroy');
    });

    Route::controller(TelkomselController::class)->group(function (){
        Route::get('/telkomsel', 'index')->name('telkomsel');
        Route::post('/telkomsel/store', 'store')->name('telkomsel.store');
        Route::put('/telkomsel/update', 'update')->name('telkomsel.update');
        Route::delete('/telkomsel/{telkomsel}', 'destroy')->name('telkomsel.destroy');
    });

    Route::controller(KaryawanController::class)->group(function (){
        Route::get('/karyawan', 'index')->name('karyawan');
        Route::put('/karyawan/update', 'update')->name('karyawan.update');
        Route::delete('/karyawan/{user}', 'destroy')->name('karyawan.destroy');
    });
});
