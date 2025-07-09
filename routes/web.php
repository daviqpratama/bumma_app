<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SaldoAwalController;
use App\Http\Controllers\JurnalUmumController;
use App\Http\Controllers\BukuBesarController;
use App\Http\Controllers\NeracaSaldoController;
use App\Http\Controllers\JurnalPenyesuaianController;
use App\Http\Controllers\NeracaLajurController;
use App\Http\Controllers\LaporanKeuanganController;
use App\Http\Controllers\ProfileController;

// Redirect ke dashboard setelah masuk ke root
Route::get('/', function () {
    return redirect()->route('dashboard');
});

// Cek status Laravel (opsional)
Route::get('/cek', function () {
    return 'Laravel OK';
});

// -------------------
// ✅ ROUTE USER
// -------------------
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::view('/daftar_usaha', 'daftar_usaha')->name('daftar_usaha');
    Route::view('/riwayat_transaksi', 'riwayat_transaksi')->name('riwayat_transaksi');
    Route::view('/distribusi_dana_sosial', 'distribusi_dana_sosial')->name('distribusi_dana_sosial');

    Route::get('/kehutanan', fn() => view('kehutanan.index'))->name('kehutanan.index');
    Route::get('/ekowisata', fn() => view('ekowisata.index'))->name('ekowisata.index');
    Route::get('/pertanian', fn() => view('pertanian.index'))->name('pertanian.index');
    Route::get('/peternakan', fn() => view('peternakan.index'))->name('peternakan.index');
    Route::get('/perikanan', fn() => view('perikanan.index'))->name('perikanan.index');

    // Laporan kinerja
    Route::get('/laporan-kinerja', fn() => view('laporan-kinerja.index'))->name('laporan.kinerja');
});

// -------------------
// ✅ ROUTE ADMIN
// -------------------
Route::middleware(['auth'])->group(function () {
    Route::get('/saldo-awal', [SaldoAwalController::class, 'index'])->name('saldo-awal');
    Route::get('/jurnal-umum', [JurnalUmumController::class, 'index'])->name('jurnal-umum');

    Route::get('/buku-besar', [BukuBesarController::class, 'index'])->name('buku-besar.index');
    Route::get('/buku-besar/export/pdf', [BukuBesarController::class, 'exportPdf'])->name('buku-besar.export.pdf');
    Route::get('/buku-besar/export/excel', [BukuBesarController::class, 'exportExcel'])->name('buku-besar.export.excel');

    Route::get('/neraca-saldo', [NeracaSaldoController::class, 'index'])->name('neraca-saldo.index');
    Route::get('/jurnal-penyesuaian', [JurnalPenyesuaianController::class, 'index'])->name('jurnal-penyesuaian.index');
    Route::get('/jurnal-penyesuaian/export/pdf', [JurnalPenyesuaianController::class, 'exportPdf'])->name('jurnal-penyesuaian.export.pdf');
    Route::get('/jurnal-penyesuaian/export/excel', [JurnalPenyesuaianController::class, 'exportExcel'])->name('jurnal-penyesuaian.export.excel');

    Route::get('/neraca-lajur', [NeracaLajurController::class, 'index'])->name('neraca-lajur.index');

    Route::get('/laporan-keuangan', [LaporanKeuanganController::class, 'index'])->name('laporan-keuangan');
    Route::get('/laporan-keuangan/sisa-hasil-usaha', fn() => view('laporan-keuangan.sisa-hasil-usaha'))->name('laporan-keuangan.sisa-hasil-usaha');
    Route::get('/laporan-keuangan/posisi-keuangan', [LaporanKeuanganController::class, 'posisiKeuangan'])->name('laporan-keuangan.posisi-keuangan');
    Route::get('/laporan-keuangan/perubahan-ekuitas', [LaporanKeuanganController::class, 'perubahanEkuitas'])->name('laporan-keuangan.perubahan-ekuitas');
    Route::get('/laporan-keuangan/arus-kas', [LaporanKeuanganController::class, 'arusKas'])->name('laporan-keuangan.arus-kas');
});

// -------------------
// ✅ PROFILE (User/Admin)
// -------------------
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// -------------------
// ✅ AUTH route bawaan Laravel
// -------------------
require __DIR__.'/auth.php';
