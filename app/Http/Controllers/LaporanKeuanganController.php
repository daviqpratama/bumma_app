<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Akun;
use App\Models\JurnalUmum;
use App\Models\SaldoAwal;
use Carbon\Carbon;

class LaporanKeuanganController extends Controller
{
    public function index()
    {
        return view('laporan-keuangan.index');
    }

    public function sisaHasilUsaha()
    {
        $tahun = date('Y');

        $pendapatanAkuns = Akun::where('jenis', 'Pendapatan')->get();
        foreach ($pendapatanAkuns as $akun) {
            $akun->jumlah = JurnalUmum::where('akun_id', $akun->id)
                ->where('posisi', 'kredit')
                ->whereYear('tanggal', $tahun)
                ->whereIn('ref', ['Transaksi', 'Penyesuaian'])
                ->sum('nominal');
        }

        $bebanAkuns = Akun::where('jenis', 'Beban')->get();
        foreach ($bebanAkuns as $akun) {
            $akun->jumlah = JurnalUmum::where('akun_id', $akun->id)
                ->where('posisi', 'debit')
                ->whereYear('tanggal', $tahun)
                ->whereIn('ref', ['Transaksi', 'Penyesuaian'])
                ->sum('nominal');
        }

        $totalPendapatan = $pendapatanAkuns->sum('jumlah');
        $totalBeban = $bebanAkuns->sum('jumlah');
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
        $tahun = date('Y');
        $akuns = Akun::with(['saldoAwals', 'jurnalUmum'])->get();

        foreach ($akuns as $akun) {
            $saldoAwalDebit = $akun->saldoAwals->filter(fn($s) => Carbon::parse($s->created_at)->year == $tahun)->sum('debit');
            $saldoAwalKredit = $akun->saldoAwals->filter(fn($s) => Carbon::parse($s->created_at)->year == $tahun)->sum('kredit');

            $jurnalDebit = $akun->jurnalUmum->filter(fn($j) =>
                $j->posisi == 'debit' &&
                in_array($j->ref, ['Transaksi', 'Penyesuaian']) &&
                Carbon::parse($j->tanggal)->year == $tahun
            )->sum('nominal');

            $jurnalKredit = $akun->jurnalUmum->filter(fn($j) =>
                $j->posisi == 'kredit' &&
                in_array($j->ref, ['Transaksi', 'Penyesuaian']) &&
                Carbon::parse($j->tanggal)->year == $tahun
            )->sum('nominal');

            $totalDebit = $saldoAwalDebit + $jurnalDebit;
            $totalKredit = $saldoAwalKredit + $jurnalKredit;

            $akun->saldo = in_array($akun->tipe ?? '', ['Aktiva', 'Beban'])
                ? $totalDebit - $totalKredit
                : $totalKredit - $totalDebit;
        }

        $aktiva = $akuns->where('tipe', 'Aktiva')->groupBy('kelompok');
        $pasiva = $akuns->where('tipe', 'Pasiva')->groupBy('kelompok');

        return view('laporan-keuangan.posisi-keuangan', compact('aktiva', 'pasiva'));
    }

    public function perubahanEkuitas()
    {
        $tahun = request('tahun') ?? date('Y');

        $akunEkuitas = Akun::where('jenis', 'Ekuitas')->with('saldoAwals')->get();

        $modalAwal = $akunEkuitas->sum(function ($akun) use ($tahun) {
            return $akun->saldoAwals->filter(function ($s) use ($tahun) {
                return Carbon::parse($s->created_at)->year == $tahun;
            })->sum(fn($s) => ($s->kredit ?? 0) - ($s->debit ?? 0));
        });

        $pendapatan = JurnalUmum::whereHas('akun', fn($q) => $q->where('jenis', 'Pendapatan'))
            ->whereYear('tanggal', $tahun)
            ->where('posisi', 'kredit')
            ->whereIn('ref', ['Transaksi', 'Penyesuaian'])
            ->sum('nominal');

        $beban = JurnalUmum::whereHas('akun', fn($q) => $q->where('jenis', 'Beban'))
            ->whereYear('tanggal', $tahun)
            ->where('posisi', 'debit')
            ->whereIn('ref', ['Transaksi', 'Penyesuaian'])
            ->sum('nominal');

        $shu = $pendapatan - $beban;

        $danaKomunitas = JurnalUmum::whereHas('akun', fn($q) => $q->where('kode', '311'))
            ->whereYear('tanggal', $tahun)
            ->sum('nominal');

        $asetTetap = JurnalUmum::whereHas('akun', fn($q) => $q->where('kode', '112'))
            ->whereYear('tanggal', $tahun)
            ->sum('nominal');

        $distribusi = JurnalUmum::whereHas('akun', fn($q) => $q->where('kode', '511'))
            ->whereYear('tanggal', $tahun)
            ->sum('nominal');

        $biayaRitual = JurnalUmum::whereHas('akun', fn($q) => $q->where('kode', '611'))
            ->whereYear('tanggal', $tahun)
            ->sum('nominal');

        $perubahan = $shu + $danaKomunitas + $asetTetap - $distribusi - $biayaRitual;
        $modalAkhir = $modalAwal + $perubahan;

        $data = compact(
            'modalAwal',
            'shu',
            'danaKomunitas',
            'asetTetap',
            'distribusi',
            'biayaRitual',
            'perubahan',
            'modalAkhir',
            'tahun'
        );

        return view('laporan-keuangan.perubahan-ekuitas', compact('data'));
    }

    public function arusKas(Request $request)
    {
        $tahun = $request->input('tahun', date('Y'));

        $data = collect([
            'penjualan_produk' => 0,
            'jasa_ekosistem' => 0,
            'hasil_hutan' => 0,
            'donasi_komunitas' => 0,
            'biaya_produksi' => 0,
            'biaya_distribusi' => 0,
            'upah_pekerja' => 0,
            'dana_komunitas' => 0,
            'hibah_sosial' => 0,
            'biaya_ritual' => 0,
            'kontribusi_masyarakat' => 0,
            'dampak_ekosistem' => 0,
            'pinjaman_diterima' => 0,
            'utang_diterima' => 0,
            'bayar_pinjaman' => 0,
            'bayar_utang' => 0,
            'kas_awal' => 0,
            'kas_akhir' => 0,
        ]);

        $jurnals = JurnalUmum::with('akun')->whereYear('tanggal', $tahun)->get();

        foreach ($jurnals as $jurnal) {
            $nama = strtolower(optional($jurnal->akun)->nama ?? '');
            foreach ($data->keys() as $key) {
                if (str_contains($nama, str_replace('_', ' ', $key))) {
                    $data[$key] += $jurnal->nominal;
                }
            }
        }

        $data['kas_awal'] = SaldoAwal::sum('debit') - SaldoAwal::sum('kredit');

        $totalPenerimaan = $data->only([
            'penjualan_produk',
            'jasa_ekosistem',
            'hasil_hutan',
            'donasi_komunitas',
            'dana_komunitas',
            'hibah_sosial',
            'pinjaman_diterima',
            'utang_diterima'
        ])->sum();

        $totalPengeluaran = $data->only([
            'biaya_produksi',
            'biaya_distribusi',
            'upah_pekerja',
            'biaya_ritual',
            'kontribusi_masyarakat',
            'dampak_ekosistem',
            'bayar_pinjaman',
            'bayar_utang'
        ])->sum();

        $kas_bersih = $totalPenerimaan - $totalPengeluaran;
        $data['kas_akhir'] = $data['kas_awal'] + $kas_bersih;

        return view('laporan-keuangan.arus-kas', [
            'data' => $data->toArray(),
            'tahun' => $tahun,
        ]);
    }
}
