<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Proteksi agar hanya user yang login bisa mengakses dashboard.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Dashboard utama (default)
     */
    public function index()
    {
        $user = Auth::user();

        // Data dummy untuk admin dashboard
        $totalPendapatan = 350000000;
        $totalBiaya = 120000000;
        $keuntungan = $totalPendapatan - $totalBiaya;
        $jumlahTransaksi = 150;

        // Cek role user dan arahkan ke view sesuai peran
        if ($user->role === 'admin') {
            return view('dashboard.admin', compact(
                'totalPendapatan',
                'totalBiaya',
                'keuntungan',
                'jumlahTransaksi'
            ));
        } elseif ($user->role === 'user') {
            return view('dashboard.user');
        } else {
            // Jika role tidak dikenali
            return view('errors.role-not-found');
        }
    }

    /**
     * ✅ Tambahan route khusus jika diarahkan ke 'admin.dashboard'
     */
    public function adminDashboard()
    {
        // Kamu bisa pakai redirect ke index(), atau pisahkan logic
        return $this->index();
    }

    /**
     * ✅ Tambahan route khusus jika diarahkan ke 'user.dashboard'
     */
    public function userDashboard()
    {
        return $this->index();
    }
}
