<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Akun;
use App\Models\JurnalUmum;
use App\Models\SaldoAwal;

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
        $totalPendapatan = 0;
        foreach ($pendapatanAkuns as $akun) {
            $akun->jumlah = JurnalUmum::where('akun_id', $akun->id)
                ->where('posisi', 'kredit')
                ->whereYear('tanggal', $tahun)
                ->whereIn('ref', ['Transaksi', 'Penyesuaian'])
                ->sum('nominal');
            $totalPendapatan += $akun->jumlah;
        }

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
    $tahun = date('Y'); // atau bisa pakai request('tahun')

    $akuns = Akun::all();

    foreach ($akuns as $akun) {
        // Saldo awal
        $saldoAwalDebit = $akun->saldoAwals()->whereYear('created_at', $tahun)->sum('debit');
        $saldoAwalKredit = $akun->saldoAwals()->whereYear('created_at', $tahun)->sum('kredit');

        // Jurnal transaksi dan penyesuaian
        $jurnalDebit = $akun->jurnalUmum()
            ->whereYear('tanggal', $tahun)
            ->where('posisi', 'debit')
            ->whereIn('ref', ['Transaksi', 'Penyesuaian'])
            ->sum('nominal');

        $jurnalKredit = $akun->jurnalUmum()
            ->whereYear('tanggal', $tahun)
            ->where('posisi', 'kredit')
            ->whereIn('ref', ['Transaksi', 'Penyesuaian'])
            ->sum('nominal');

        $totalDebit = $saldoAwalDebit + $jurnalDebit;
        $totalKredit = $saldoAwalKredit + $jurnalKredit;

        // Hitung saldo berdasarkan tipe
        if (in_array($akun->tipe, ['Aktiva', 'Beban'])) {
            $akun->saldo = $totalDebit - $totalKredit;
        } else {
            $akun->saldo = $totalKredit - $totalDebit;
        }

        // Format nama_akun untuk view
        $akun->nama_akun = $akun->nama;
    }

    $aktiva = $akuns->where('tipe', 'Aktiva')->groupBy('kelompok');
    $pasiva = $akuns->where('tipe', 'Pasiva')->groupBy('kelompok');

    return view('laporan-keuangan.posisi-keuangan', compact('aktiva', 'pasiva'));
}


    public function perubahanEkuitas()
    {
        $tahun = request('tahun') ?? date('Y');

        $modalAwal = Akun::where('jenis', 'Ekuitas')->with('saldoAwals')->get()->sum(function ($akun) use ($tahun) {
            return $akun->saldoAwals->where('created_at', 'like', $tahun . '%')->sum(function ($s) {
                return ($s->debit ?? 0) - ($s->kredit ?? 0);
            });
        });

        $pendapatan = JurnalUmum::whereHas('akun', function ($query) {
            $query->where('jenis', 'Pendapatan');
        })
            ->whereYear('tanggal', $tahun)
            ->where('posisi', 'kredit')
            ->whereIn('ref', ['Transaksi', 'Penyesuaian'])
            ->sum('nominal');

        $beban = JurnalUmum::whereHas('akun', function ($query) {
            $query->where('jenis', 'Beban');
        })
            ->whereYear('tanggal', $tahun)
            ->where('posisi', 'debit')
            ->whereIn('ref', ['Transaksi', 'Penyesuaian'])
            ->sum('nominal');

        $labaRugi = $pendapatan - $beban;

        $danaKomunitas = JurnalUmum::whereHas('akun', function ($query) {
            $query->where('kode', '311');
        })
            ->whereYear('tanggal', $tahun)
            ->sum('nominal');

        $asetTetap = JurnalUmum::whereHas('akun', function ($query) {
            $query->where('kode', '112');
        })
            ->whereYear('tanggal', $tahun)
            ->sum('nominal');

        $distribusi = JurnalUmum::whereHas('akun', function ($query) {
            $query->where('kode', '511');
        })
            ->whereYear('tanggal', $tahun)
            ->sum('nominal');

        $biayaRitual = JurnalUmum::whereHas('akun', function ($query) {
            $query->where('kode', '611');
        })
            ->whereYear('tanggal', $tahun)
            ->sum('nominal');

        $perubahan = $labaRugi + $danaKomunitas + $asetTetap - $distribusi - $biayaRitual;
        $modalAkhir = $modalAwal + $perubahan;

        $data = [
            'modal_awal' => $modalAwal,
            'shu' => $labaRugi,
            'dana_komunitas' => $danaKomunitas,
            'aset_tetap' => $asetTetap,
            'distribusi_masyarakat' => $distribusi,
            'biaya_ritual' => $biayaRitual,
            'perubahan' => $perubahan,
            'modal_akhir' => $modalAkhir,
            'tahun' => $tahun,
        ];

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
            $nama = strtolower($jurnal->akun->nama);

            foreach ($data->keys() as $key) {
                if (str_contains($nama, str_replace('_', ' ', $key))) {
                    $data[$key] += $jurnal->nominal;
                }
            }
        }

        $data['kas_awal'] = SaldoAwal::sum('saldo');

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
