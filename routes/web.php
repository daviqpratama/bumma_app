<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Route Frontend
Route::view('/daftar_usaha', 'daftar_usaha')->name('daftar_usaha');
Route::view('/riwayat_transaksi', 'riwayat_transaksi')->name('riwayat_transaksi');
Route::view('/distribusi_dana_sosial', 'distribusi_dana_sosial')->name('distribusi_dana_sosial');

//Route Daftar Usaha
Route::get('/kehutanan', function () {
    return view('kehutanan.index');
})->name('kehutanan.index');

Route::get('/ekowisata', function () {
    return view('ekowisata.index');
})->name('ekowisata.index');


Route::get('/pertanian', function () {
    return view('pertanian.index');
})->name('pertanian.index');


Route::get('/peternakan', function () {
    return view('peternakan.index');
})->name('peternakan.index');

Route::get('/perikanan', function () {
    return view('perikanan.index');
})->name('perikanan.index');

require __DIR__.'/auth.php';
