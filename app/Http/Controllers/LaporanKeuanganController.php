<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Akun;

class LaporanKeuanganController extends Controller
{
    public function index()
    {
        return view('laporan-keuangan.index');
    }

    public function posisiKeuangan()
    {
        // Ambil data akun dari database
        $data = Akun::select('nama_akun', 'tipe', 'kelompok', 'saldo')->get();

        // Kelompokkan berdasarkan tipe
        $aktiva = $data->where('tipe', 'Aktiva')->groupBy('kelompok');
        $pasiva = $data->where('tipe', 'Pasiva')->groupBy('kelompok');

        // Kirim ke view
        return view('laporan-keuangan.posisi-keuangan', compact('aktiva', 'pasiva'));
    }
    public function perubahanEkuitas()
{
    $data = [
        'modal_awal' => 0,
        'laba_rugi' => 0,
        'dana_komunitas' => 0,
        'aset_tetap' => 0,
        'distribusi_masyarakat' => 0,
        'biaya_ritual' => 0,
    ];

    $data['perubahan'] = 
        $data['laba_rugi'] + 
        $data['dana_komunitas'] + 
        $data['aset_tetap'] -
        $data['distribusi_masyarakat'] -
        $data['biaya_ritual'];

    $data['modal_akhir'] = $data['modal_awal'] + $data['perubahan'];

    return view('laporan-keuangan.perubahan-ekuitas', compact('data'));
}

public function arusKas()
{
    // Dummy data sementara (nanti bisa ambil dari model Transaksi, dll)
    return view('laporan-keuangan.arus-kas');
}

}