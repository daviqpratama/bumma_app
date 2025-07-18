<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Akun;
use App\Models\JurnalUmum;

class LaporanKeuanganController extends Controller
{
    public function index()
    {
        return view('laporan-keuangan.index');
    }

    public function sisaHasilUsaha()
    {
        $tahun = date('Y');

        // Pendapatan
        $pendapatanAkuns = Akun::where('jenis', 'Pendapatan')->get();
        $totalPendapatan = 0;
        foreach ($pendapatanAkuns as $akun) {
            $akun->jumlah = JurnalUmum::where('akun_id', $akun->id)
                ->where('posisi', 'kredit')
                ->whereYear('tanggal', $tahun)
                ->whereIn('ref', ['Transaksi', 'Penyesuaian'])
                ->sum('nominal');
            $totalPendapatan += $akun->jumlah;
        }

        // Beban
        $bebanAkuns = Akun::where('jenis', 'Beban')->get();
        $totalBeban = 0;
        foreach ($bebanAkuns as $akun) {
            $akun->jumlah = JurnalUmum::where('akun_id', $akun->id)
                ->where('posisi', 'debit')
                ->whereYear('tanggal', $tahun)
                ->whereIn('ref', ['Transaksi', 'Penyesuaian'])
                ->sum('nominal');
            $totalBeban += $akun->jumlah;
        }

        $labaSebelumPajak = $totalPendapatan - $totalBeban;

        return view('laporan-keuangan.sisa-hasil-usaha', compact(
            'tahun',
            'pendapatanAkuns',
            'bebanAkuns',
            'totalPendapatan',
            'totalBeban',
            'labaSebelumPajak'
        ));
    }

    public function posisiKeuangan()
    {
        $data = Akun::select('nama', 'tipe', 'kelompok', 'saldo')->get();
        $aktiva = $data->where('tipe', 'Aktiva')->groupBy('kelompok');
        $pasiva = $data->where('tipe', 'Pasiva')->groupBy('kelompok');

        return view('laporan-keuangan.posisi-keuangan', compact('aktiva', 'pasiva'));
    }

    public function perubahanEkuitas()
    {
        $tahun = request('tahun') ?? date('Y');

        // Modal awal dari akun jenis Ekuitas
        $modalAwal = Akun::where('jenis', 'Ekuitas')->with('saldoAwals')->get()->sum(function ($akun) use ($tahun) {
            return $akun->saldoAwals->where('created_at', 'like', $tahun . '%')->sum(function ($s) {
                return ($s->debit ?? 0) - ($s->kredit ?? 0);
            });
        });

        // Pendapatan
        $pendapatan = JurnalUmum::whereHas('akun', function ($query) {
            $query->where('jenis', 'Pendapatan');
        })
            ->whereYear('tanggal', $tahun)
            ->where('posisi', 'kredit')
            ->whereIn('ref', ['Transaksi', 'Penyesuaian'])
            ->sum('nominal');

        // Beban
        $beban = JurnalUmum::whereHas('akun', function ($query) {
            $query->where('jenis', 'Beban');
        })
            ->whereYear('tanggal', $tahun)
            ->where('posisi', 'debit')
            ->whereIn('ref', ['Transaksi', 'Penyesuaian'])
            ->sum('nominal');

        $labaRugi = $pendapatan - $beban;

        // Dana Komunitas (akun kode: 311)
        $danaKomunitas = JurnalUmum::whereHas('akun', function ($query) {
            $query->where('kode', '311');
        })
            ->whereYear('tanggal', $tahun)
            ->sum('nominal');

        // Aset Tetap (akun kode: 112)
        $asetTetap = JurnalUmum::whereHas('akun', function ($query) {
            $query->where('kode', '112');
        })
            ->whereYear('tanggal', $tahun)
            ->sum('nominal');

        // Distribusi ke Masyarakat (akun kode: 511)
        $distribusi = JurnalUmum::whereHas('akun', function ($query) {
            $query->where('kode', '511');
        })
            ->whereYear('tanggal', $tahun)
            ->sum('nominal');

        // Biaya Ritual dan Ekosistem (akun kode: 611)
        $biayaRitual = JurnalUmum::whereHas('akun', function ($query) {
            $query->where('kode', '611');
        })
            ->whereYear('tanggal', $tahun)
            ->sum('nominal');

        $perubahan = $labaRugi + $danaKomunitas + $asetTetap - $distribusi - $biayaRitual;
        $modalAkhir = $modalAwal + $perubahan;

        $data = [
        'modal_awal' => $modalAwal,
        'shu' => $labaRugi, // ganti key dari 'laba_rugi' jadi 'shu' agar konsisten dengan view
        'dana_komunitas' => $danaKomunitas,
        'aset_tetap' => $asetTetap,
        'distribusi_masyarakat' => $distribusi,
        'biaya_ritual' => $biayaRitual,
        'perubahan' => $perubahan,
        'modal_akhir' => $modalAkhir,
        'tahun' => $tahun, // ⬅️ tambahkan ini biar bisa diakses dari $data['tahun']
    ];

    return view('laporan-keuangan.perubahan-ekuitas', compact('data'));

    }

    public function arusKas()
    {
        return view('laporan-keuangan.arus-kas');
    }
}
