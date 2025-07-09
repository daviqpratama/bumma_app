<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Data dummy
        $totalPendapatan = 350000000;
        $totalBiaya = 120000000;
        $keuntungan = $totalPendapatan - $totalBiaya;
        $jumlahTransaksi = 150;

        // ✅ Kirim ke view admin.dashboard
        return view('admin.dashboard', compact(
            'totalPendapatan',
            'totalBiaya',
            'keuntungan',
            'jumlahTransaksi'
        ));
    }
}
