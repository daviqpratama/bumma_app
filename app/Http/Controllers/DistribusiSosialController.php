<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Akun;

class DistribusiSosialController extends Controller
{
    public function index()
    {
        // Ambil semua ID akun yang kategori arus kas-nya 'Sosial & Ritual'
        $akunSosialIds = Akun::where('kategori_arus_kas', 'Sosial & Ritual')
                            ->pluck('id')
                            ->toArray();

        // Ambil transaksi yang melibatkan akun-akun tersebut
        $distribusi = Transaksi::whereIn('akun_debit', $akunSosialIds)
            ->orWhereIn('akun_kredit', $akunSosialIds)
            ->orderByDesc('tanggal')
            ->get();

        return view('distribusi_dana_sosial', compact('distribusi'));
    }
}
