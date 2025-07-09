<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use App\Models\Akun;

class BukuBesarController extends Controller
{
    public function index(Request $request)
    {
        // Ambil daftar akun dari database
        $akunList = Akun::all();

        // Dummy data transaksi (bisa diganti dengan data dari database)
        $data = collect([
            (object)['akun_id' => 1, 'tanggal' => '2024-04-10', 'no_ref' => 'TRX-001', 'deskripsi' => 'Penjualan hasil kebun', 'debit' => 5000000, 'kredit' => 0],
            (object)['akun_id' => 2, 'tanggal' => '2024-04-12', 'no_ref' => 'TRX-002', 'deskripsi' => 'Pembelian alat tani', 'debit' => 0, 'kredit' => 2000000],
            (object)['akun_id' => 1, 'tanggal' => '2024-04-15', 'no_ref' => 'TRX-003', 'deskripsi' => 'Pembayaran listrik', 'debit' => 0, 'kredit' => 500000],
            (object)['akun_id' => 3, 'tanggal' => '2024-04-18', 'no_ref' => 'TRX-004', 'deskripsi' => 'Penjualan pupuk', 'debit' => 3000000, 'kredit' => 0],
            (object)['akun_id' => 2, 'tanggal' => '2024-04-20', 'no_ref' => 'TRX-005', 'deskripsi' => 'Pembelian bibit', 'debit' => 0, 'kredit' => 1000000],
            (object)['akun_id' => 1, 'tanggal' => '2024-04-22', 'no_ref' => 'TRX-006', 'deskripsi' => 'Penjualan hasil panen', 'debit' => 4000000, 'kredit' => 0],
            (object)['akun_id' => 3, 'tanggal' => '2024-04-25', 'no_ref' => 'TRX-007', 'deskripsi' => 'Biaya transportasi', 'debit' => 0, 'kredit' => 750000],
            (object)['akun_id' => 1, 'tanggal' => '2024-04-28', 'no_ref' => 'TRX-008', 'deskripsi' => 'Pendapatan tambahan', 'debit' => 1000000, 'kredit' => 0],
        ]);

        // Filter data berdasarkan akun (jika ada)
        if ($request->filled('akun')) {
            $data = $data->where('akun_id', $request->akun);
        }

        // Filter data berdasarkan tanggal (jika ada)
        if ($request->filled('tanggal')) {
            $data = $data->where('tanggal', $request->tanggal);
        }

        // Hitung saldo berjalan
        $saldo = 0;
        $data = $data->map(function ($item) use (&$saldo) {
            $saldo += $item->debit - $item->kredit;
            $item->saldo = $saldo;
            return $item;
        });

        // Pagination manual
        $perPage = 5;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = $data->slice(($currentPage - 1) * $perPage, $perPage)->values();
        $paginated = new LengthAwarePaginator($currentItems, $data->count(), $perPage, $currentPage, [
            'path' => request()->url(),
            'query' => request()->query(),
        ]);

        return view('buku-besar.index', [
            'transaksi' => $paginated,
            'akunList' => $akunList
        ]);
    }

    public function exportPdf()
    {
        return 'Export PDF belum diimplementasi';
    }

    public function exportExcel()
    {
        return 'Export Excel belum diimplementasi';
    }
}
