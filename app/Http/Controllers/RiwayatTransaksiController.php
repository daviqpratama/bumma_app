<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JurnalUmum;

class RiwayatTransaksiController extends Controller
{
    public function index()
    {
        $jurnal = JurnalUmum::with('akun')->orderBy('tanggal', 'desc')->get();
        return view('riwayat_transaksi', compact('jurnal'));
    }
}
