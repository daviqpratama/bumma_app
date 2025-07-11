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

Route::get('/', fn () => redirect()->route('dashboard'));

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {

    // ✅ Redirect ke dashboard berdasarkan role
    Route::get('/dashboard', function () {
        $user = auth()->user();

        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($user->role === 'user') {
            return redirect()->route('user.dashboard');
        }

        abort(403, 'Role tidak dikenali.');
    })->name('dashboard');

    // ✅ Dashboard berdasarkan role
    Route::get('/admin/dashboard', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/user/dashboard', [DashboardController::class, 'userDashboard'])->name('user.dashboard');

    // -----------------------
    // ✅ ADMIN ONLY ROUTES
    // -----------------------
    Route::middleware(['role:admin'])->group(function () {
        // Saldo Awal
        Route::get('/saldo-awal', [SaldoAwalController::class, 'index'])->name('saldo-awal.index');
        Route::get('/saldo-awal/create', [SaldoAwalController::class, 'create'])->name('saldo-awal.create');
        Route::post('/saldo-awal', [SaldoAwalController::class, 'store'])->name('saldo-awal.store');
        Route::get('/saldo-awal/{id}/edit', [SaldoAwalController::class, 'edit'])->name('saldo-awal.edit');
        Route::put('/saldo-awal/{id}', [SaldoAwalController::class, 'update'])->name('saldo-awal.update');
        Route::delete('/saldo-awal/{id}', [SaldoAwalController::class, 'destroy'])->name('saldo-awal.destroy');

        // Jurnal Umum
        Route::get('/jurnal-umum', [JurnalUmumController::class, 'index'])->name('jurnal-umum.index');
        Route::post('/jurnal-umum', [JurnalUmumController::class, 'store'])->name('jurnal-umum.store');
        Route::get('/jurnal-umum/{id}/edit', [JurnalUmumController::class, 'edit'])->name('jurnal-umum.edit');
        Route::put('/jurnal-umum/{id}', [JurnalUmumController::class, 'update'])->name('jurnal-umum.update');
        Route::delete('/jurnal-umum/{id}', [JurnalUmumController::class, 'destroy'])->name('jurnal-umum.destroy');

        // Buku Besar
        Route::get('/buku-besar', [BukuBesarController::class, 'index'])->name('buku-besar.index');
        Route::get('/buku-besar/export/pdf', [BukuBesarController::class, 'exportPdf'])->name('buku-besar.export.pdf');
        Route::get('/buku-besar/export/excel', [BukuBesarController::class, 'exportExcel'])->name('buku-besar.export.excel');

        // Neraca Saldo
        Route::get('/neraca-saldo', [NeracaSaldoController::class, 'index'])->name('neraca-saldo.index');

        // Jurnal Penyesuaian
        Route::get('/jurnal-penyesuaian', [JurnalPenyesuaianController::class, 'index'])->name('jurnal-penyesuaian.index');
        Route::get('/jurnal-penyesuaian/export/pdf', [JurnalPenyesuaianController::class, 'exportPdf'])->name('jurnal-penyesuaian.export.pdf');
        Route::get('/jurnal-penyesuaian/export/excel', [JurnalPenyesuaianController::class, 'exportExcel'])->name('jurnal-penyesuaian.export.excel');

        // Neraca Lajur
        Route::get('/neraca-lajur', [NeracaLajurController::class, 'index'])->name('neraca-lajur.index');

        // Laporan Keuangan
        Route::get('/laporan-keuangan', [LaporanKeuanganController::class, 'index'])->name('laporan-keuangan');
        Route::get('/laporan-keuangan/sisa-hasil-usaha', fn () => view('laporan-keuangan.sisa-hasil-usaha'))->name('laporan-keuangan.sisa-hasil-usaha');
        Route::get('/laporan-keuangan/posisi-keuangan', [LaporanKeuanganController::class, 'posisiKeuangan'])->name('laporan-keuangan.posisi-keuangan');
        Route::get('/laporan-keuangan/perubahan-ekuitas', [LaporanKeuanganController::class, 'perubahanEkuitas'])->name('laporan-keuangan.perubahan-ekuitas');
        Route::get('/laporan-keuangan/arus-kas', [LaporanKeuanganController::class, 'arusKas'])->name('laporan-keuangan.arus-kas');
    });

    // -----------------------
    // ✅ USER ONLY ROUTES
    // -----------------------
    Route::middleware(['role:user'])->group(function () {
        Route::view('/daftar_usaha', 'daftar_usaha')->name('daftar_usaha');
        Route::view('/riwayat_transaksi', 'riwayat_transaksi')->name('riwayat_transaksi');
        Route::view('/distribusi_dana_sosial', 'distribusi_dana_sosial')->name('distribusi_dana_sosial');
        Route::get('/laporan-kinerja', fn () => view('laporan-kinerja.index'))->name('laporan.kinerja');
        Route::get('/kehutanan', fn () => view('kehutanan.index'))->name('kehutanan.index');
        Route::get('/ekowisata', fn () => view('ekowisata.index'))->name('ekowisata.index');
        Route::get('/pertanian', fn () => view('pertanian.index'))->name('pertanian.index');
        Route::get('/peternakan', fn () => view('peternakan.index'))->name('peternakan.index');
        Route::get('/perikanan', fn () => view('perikanan.index'))->name('perikanan.index');
    });

    // ✅ Profile untuk semua role
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
