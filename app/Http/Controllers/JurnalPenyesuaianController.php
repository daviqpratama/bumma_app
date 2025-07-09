<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JurnalPenyesuaianController extends Controller
{
    public function index(Request $request)
    {
        $data = collect([
            (object)[
                'tanggal' => '2024-04-10',
                'nomor_jurnal' => 'JRN-001', // ❗ ganti 'nomor' jadi 'nomor_jurnal' agar sesuai Blade
                'akun' => 'Kas',
                'deskripsi' => 'Penyesuaian kas berdasarkan saldo bank',
                'debit' => 5000000,
                'kredit' => 0,
                'saldo_akhir' => 105000000,
                'status' => 'Selesai',
                'catatan' => '-',
            ],
            (object)[
                'tanggal' => '2024-04-12',
                'nomor_jurnal' => 'JRN-002',
                'akun' => 'Utang Usaha',
                'deskripsi' => 'Penyesuaian utang usaha yang belum tercatat',
                'debit' => 0,
                'kredit' => 2000000,
                'saldo_akhir' => 18000000,
                'status' => 'Selesai',
                'catatan' => '-',
            ],
        ]);

        // Ringkasan
        $totalDebit = $data->sum('debit');
        $totalKredit = $data->sum('kredit');
        $totalSaldoAkhir = $data->sum('saldo_akhir');

        return view('jurnal-penyesuaian.index', [
            'jurnals' => $data, // ✅ variabel Blade yang digunakan
            'totalDebit' => $totalDebit,
            'totalKredit' => $totalKredit,
            'totalSaldoAkhir' => $totalSaldoAkhir,
        ]);
    }

    public function exportPdf()
    {
        // Sementara dikosongkan
    }

    public function exportExcel()
    {
        // Sementara dikosongkan
    }
}
