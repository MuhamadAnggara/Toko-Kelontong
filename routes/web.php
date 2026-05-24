<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\PosController;
use App\Http\Controllers\CetakStrukController;
use App\Http\Controllers\BarangMasukController; // Added this line

Route::get('/', function (\Illuminate\Http\Request $request) {
    $query = \App\Models\Barang::with('kategori');
    
    if ($search = $request->query('search')) {
        $query->where('nama_barang', 'like', "%{$search}%");
    }
    
    $barangs = $query->get();
    return view('katalog', compact('barangs'));
})->name('katalog');

Route::get('/tentang-kami', [\App\Http\Controllers\TentangKamiController::class, 'index'])->name('tentang-kami');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::resource('barang', BarangController::class);
    Route::resource('kategori', KategoriController::class);
    Route::resource('kasir', KasirController::class);
    Route::resource('barang-masuk', BarangMasukController::class)->except(['show', 'edit', 'update', 'destroy']);
    Route::get('/laporan/export-excel', [LaporanController::class, 'exportExcel'])->name('laporan.excel');
    Route::get('/laporan/cetak-pdf', [LaporanController::class, 'cetakPdf'])->name('laporan.pdf');
    Route::resource('laporan', LaporanController::class)->only(['index']);

    // Area Transaksi (Point of Sales)
    Route::get('/pos', [PosController::class, 'index'])->name('pos.index');
    Route::post('/pos/checkout', [PosController::class, 'store'])->name('pos.checkout');

    // Shared Rute (Bisa diakses pemilik atau cashier)
    Route::get('/cetak-struk/{id}', [CetakStrukController::class, 'show'])->name('cetak.struk');

    // Owner Routes
    Route::get('/owner/dashboard', [OwnerController::class, 'dashboard'])->name('owner.dashboard');
    Route::get('/owner/laporan', [OwnerController::class, 'laporan'])->name('owner.laporan');
    Route::get('/owner/karyawan', [OwnerController::class, 'karyawan'])->name('owner.karyawan');
    Route::post('/owner/karyawan', [OwnerController::class, 'storeKaryawan'])->name('owner.karyawan.store');
    Route::put('/owner/karyawan/{id}', [OwnerController::class, 'updateKaryawan'])->name('owner.karyawan.update');
    Route::delete('/owner/karyawan/{id}', [OwnerController::class, 'destroyKaryawan'])->name('owner.karyawan.destroy');
    Route::get('/owner/pengaturan', [OwnerController::class, 'pengaturan'])->name('owner.pengaturan');
    Route::post('/owner/pengaturan', [OwnerController::class, 'updatePengaturan'])->name('owner.pengaturan.update');
});
