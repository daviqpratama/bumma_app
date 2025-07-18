<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BukuBesar;
use App\Models\Akun;
use Barryvdh\DomPDF\Facade\Pdf;

class BukuBesarController extends Controller
{
    public function index(Request $request)
    {
        $daftarAkun = Akun::orderBy('kode')->get();

        $transaksis = BukuBesar::with('akun');

        if ($request->filled('akun_id')) {
            $transaksis->where('akun_id', $request->akun_id);
        }

        if ($request->filled('tanggal')) {
            $transaksis->whereDate('tanggal', '<=', $request->tanggal);
        }

        $transaksis = $transaksis->orderBy('tanggal')->paginate(15)->withQueryString();

        return view('buku-besar.index', [
            'transaksis' => $transaksis,
            'daftarAkun' => $daftarAkun
        ]);
    }

    public function exportPdf(Request $request)
    {
        $transaksis = BukuBesar::with('akun');

        if ($request->filled('akun_id')) {
            $transaksis->where('akun_id', $request->akun_id);
        }

        if ($request->filled('tanggal')) {
            $transaksis->whereDate('tanggal', '<=', $request->tanggal);
        }

        $transaksis = $transaksis->orderBy('tanggal')->get();

        // Hitung saldo berjalan
        $saldo = 0;
        foreach ($transaksis as $item) {
            $saldo += $item->debit - $item->kredit;
            $item->saldo = $saldo;
        }

        $pdf = Pdf::loadView('buku-besar.export-pdf', compact('transaksis'));
        return $pdf->download('laporan-buku-besar.pdf');
    }

    public function exportExcel(Request $request)
    {
        $transaksis = BukuBesar::with('akun');

        if ($request->filled('akun_id')) {
            $transaksis->where('akun_id', $request->akun_id);
        }

        if ($request->filled('tanggal')) {
            $transaksis->whereDate('tanggal', '<=', $request->tanggal);
        }

        $transaksis = $transaksis->orderBy('tanggal')->get();

        // Hitung saldo berjalan
        $saldo = 0;
        foreach ($transaksis as $item) {
            $saldo += $item->debit - $item->kredit;
            $item->saldo = $saldo;
        }

        $content = view('buku-besar.excel', compact('transaksis'))->render();

        return response($content)
            ->header('Content-Type', 'application/vnd.ms-excel')
            ->header('Content-Disposition', 'attachment; filename="laporan-buku-besar.xls"');
    }
}
