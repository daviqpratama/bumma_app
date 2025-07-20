<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Akun;
use App\Models\JurnalUmum;

class LaporanKinerjaController extends Controller
{
    public function index(Request $request)
    {
        $tahun = $request->input('tahun', date('Y'));

        // Ambil akun-akun penting
        $kas = Akun::where('nama', 'like', '%Kas%')->pluck('id');
        $utang = Akun::where('jenis', 'Kewajiban')->pluck('id');
        $modal = Akun::where('jenis', 'Ekuitas')->pluck('id');
        $pendapatan = Akun::where('jenis', 'Pendapatan')->pluck('id');
        $beban = Akun::where('jenis', 'Beban')->pluck('id');
        $sosial = Akun::where('nama', 'like', '%Sosial%')->pluck('id');
        $ekologis = Akun::where('nama', 'like', '%Ekologis%')->pluck('id');

        // Ambil jurnal tahun berjalan
        $jurnal = JurnalUmum::whereYear('tanggal', $tahun)->get();

        // Hitung total per akun
        $total_kas = $kas->isNotEmpty()
            ? $jurnal->whereIn('akun_id', $kas)->where('posisi', 'debit')->sum('nominal') -
              $jurnal->whereIn('akun_id', $kas)->where('posisi', 'kredit')->sum('nominal')
            : 0;

        $total_utang = $utang->isNotEmpty()
            ? $jurnal->whereIn('akun_id', $utang)->where('posisi', 'kredit')->sum('nominal') -
              $jurnal->whereIn('akun_id', $utang)->where('posisi', 'debit')->sum('nominal')
            : 0;

        $total_modal = $modal->isNotEmpty()
            ? $jurnal->whereIn('akun_id', $modal)->where('posisi', 'kredit')->sum('nominal') -
              $jurnal->whereIn('akun_id', $modal)->where('posisi', 'debit')->sum('nominal')
            : 0;

        $total_pendapatan = $pendapatan->isNotEmpty()
            ? $jurnal->whereIn('akun_id', $pendapatan)->where('posisi', 'kredit')->sum('nominal')
            : 0;

        $total_beban = $beban->isNotEmpty()
            ? $jurnal->whereIn('akun_id', $beban)->where('posisi', 'debit')->sum('nominal')
            : 0;

        $total_sosial = $sosial->isNotEmpty()
            ? $jurnal->whereIn('akun_id', $sosial)->where('posisi', 'debit')->sum('nominal')
            : 0;

        $total_ekologis = $ekologis->isNotEmpty()
            ? $jurnal->whereIn('akun_id', $ekologis)->where('posisi', 'debit')->sum('nominal')
            : 0;

        // Hitung rasio aman dari div/0
        $rasio = [
            'current_ratio' => ($total_utang != 0) ? round($total_kas / $total_utang, 2) : 'N/A',
            'cash_ratio' => ($total_utang != 0) ? round($total_kas / $total_utang, 2) : 'N/A',
            'net_profit_margin' => ($total_pendapatan != 0) ? round(($total_pendapatan - $total_beban) / $total_pendapatan, 2) : 'N/A',
            'roa' => ($total_kas != 0) ? round(($total_pendapatan - $total_beban) / $total_kas, 2) : 'N/A',
            'roe' => ($total_modal != 0) ? round(($total_pendapatan - $total_beban) / $total_modal, 2) : 'N/A',
            'der' => ($total_modal != 0) ? round($total_utang / $total_modal, 2) : 'N/A',
            'kontribusi_sosial' => ($total_pendapatan != 0) ? round(($total_sosial / $total_pendapatan) * 100, 2) . '%' : 'N/A',
            'biaya_ekologis' => ($total_pendapatan != 0) ? round(($total_ekologis / $total_pendapatan) * 100, 2) . '%' : 'N/A',
        ];

        return view('Laporan-kinerja.index', compact('rasio', 'tahun'));

    }
}
