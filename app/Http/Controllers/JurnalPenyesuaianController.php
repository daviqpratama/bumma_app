<?php

namespace App\Http\Controllers;

use App\Models\JurnalUmum;
use Illuminate\Http\Request;

class JurnalPenyesuaianController extends Controller
{
    public function index(Request $request)
    {
        $jurnals = JurnalUmum::with('akun')
            ->where('ref', 'Penyesuaian')
            ->orderBy('tanggal')
            ->orderBy('kode_jurnal')
            ->get();

        $totalDebit = $jurnals->where('posisi', 'debit')->sum('nominal');
        $totalKredit = $jurnals->where('posisi', 'kredit')->sum('nominal');

        return view('jurnal-penyesuaian.index', [
            'jurnals' => $jurnals,
            'totalDebit' => $totalDebit,
            'totalKredit' => $totalKredit,
        ]);
    }

    public function exportPdf()
    {
        // Kosong dulu, nanti bisa diisi ekspor PDF pakai DomPDF
    }

    public function exportExcel()
    {
        // Kosong dulu, nanti bisa diisi ekspor Excel pakai Laravel Excel
    }
}
