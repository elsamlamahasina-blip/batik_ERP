<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleDashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware(['auth'])->group(function () {
    // Role redirector (supports both GET and POST for maximum resilience)
    Route::match(['get', 'post'], '/dashboard', [RoleDashboardController::class, 'redirect'])->name('dashboard');

    // Role-specific dashboards
    Route::get('/dashboard/admin', [RoleDashboardController::class, 'admin'])
        ->middleware('role:admin')
        ->name('dashboard.admin');

    Route::get('/dashboard/pembelian', [RoleDashboardController::class, 'pembelian'])
        ->middleware('role:pembelian')
        ->name('dashboard.pembelian');

    Route::get('/dashboard/gudang', [RoleDashboardController::class, 'gudang'])
        ->middleware('role:gudang')
        ->name('dashboard.gudang');

    Route::get('/dashboard/penjualan', [RoleDashboardController::class, 'penjualan'])
        ->middleware('role:penjualan')
        ->name('dashboard.penjualan');

    Route::get('/dashboard/kasir', [RoleDashboardController::class, 'kasir'])
        ->middleware('role:kasir')
        ->name('dashboard.kasir');

    Route::get('/dashboard/keuangan', [RoleDashboardController::class, 'keuangan'])
        ->middleware('role:keuangan')
        ->name('dashboard.keuangan');

    Route::get('/dashboard/eksekutif', [RoleDashboardController::class, 'eksekutif'])
        ->middleware('role:eksekutif')
        ->name('dashboard.eksekutif');

    // User profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
