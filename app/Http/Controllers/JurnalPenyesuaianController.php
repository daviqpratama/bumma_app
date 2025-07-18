<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JurnalUmum;
use App\Models\SaldoAwal;
use App\Models\Akun;
use Illuminate\Support\Str;

class JurnalPenyesuaianController extends Controller
{
    public function index(Request $request)
    {
        $bulan = $request->bulan ?? now()->format('m');
        $tahun = $request->tahun ?? now()->format('Y');
        $nomorJurnal = $request->nomor_jurnal;

        // Ambil semua jurnal penyesuaian dari database
        $jurnals = JurnalUmum::with('akun')
            ->where('ref', 'Penyesuaian')
            ->when($bulan, fn($q) => $q->whereMonth('tanggal', $bulan))
            ->when($tahun, fn($q) => $q->whereYear('tanggal', $tahun))
            ->when($nomorJurnal, fn($q) => $q->where('kode_jurnal', 'like', "%$nomorJurnal%"))
            ->orderBy('tanggal')
            ->orderBy('kode_jurnal')
            ->get();

        $totalDebit = $jurnals->where('posisi', 'debit')->sum('nominal');
        $totalKredit = $jurnals->where('posisi', 'kredit')->sum('nominal');

        return view('jurnal-penyesuaian.index', [
            'jurnals' => $jurnals,
            'totalDebit' => $totalDebit,
            'totalKredit' => $totalKredit,
            'bulan' => $bulan,
            'tahun' => $tahun,
        ]);
    }

    public function exportPdf()
    {
        // Akan diisi nanti
    }

    public function exportExcel()
    {
        // Akan diisi nanti
    }

    public function generate()
    {
        $tanggal = now()->toDateString();
        $kodeJurnal = 'JP-' . now()->format('my') . '-' . strtoupper(Str::random(3));

        // Daftar akun penyesuaian otomatis (id aset => id beban, persentase penyesuaian)
        $penyesuaian = [
            ['aset' => 'Perlengkapan', 'beban' => 'Beban Perlengkapan', 'persen' => 0.2],
            ['aset' => 'Sewa Dibayar di Muka', 'beban' => 'Beban Sewa', 'persen' => 0.25],
            ['aset' => 'Asuransi Dibayar di Muka', 'beban' => 'Beban Asuransi', 'persen' => 0.2],
            ['aset' => 'Peralatan', 'beban' => 'Beban Penyusutan', 'persen' => 0.1],
        ];

        foreach ($penyesuaian as $item) {
            $akunAset = Akun::where('nama', $item['aset'])->first();
            $akunBeban = Akun::where('nama', $item['beban'])->first();

            if ($akunAset && $akunBeban) {
                // Ambil saldo awal akun aset ini (pakai total debit - kredit)
                $saldo = SaldoAwal::where('akuns_id', $akunAset->id)->get();
                $total = $saldo->sum('debit') - $saldo->sum('kredit');
                $nilaiPenyesuaian = $total * $item['persen'];

                if ($nilaiPenyesuaian > 0) {
                    // Simpan Jurnal: Debit Beban
                    JurnalUmum::create([
                        'tanggal' => $tanggal,
                        'kode_jurnal' => $kodeJurnal,
                        'akun_id' => $akunBeban->id,
                        'keterangan' => 'Penyesuaian ' . strtolower($item['aset']),
                        'posisi' => 'debit',
                        'nominal' => $nilaiPenyesuaian,
                        'ref' => 'Penyesuaian',
                    ]);

                    // Simpan Jurnal: Kredit Aset
                    JurnalUmum::create([
                        'tanggal' => $tanggal,
                        'kode_jurnal' => $kodeJurnal,
                        'akun_id' => $akunAset->id,
                        'keterangan' => 'Penyesuaian ' . strtolower($item['aset']),
                        'posisi' => 'kredit',
                        'nominal' => $nilaiPenyesuaian,
                        'ref' => 'Penyesuaian',
                    ]);
                }
            }
        }

        return redirect()->route('jurnal-penyesuaian.index')->with('success', 'Jurnal penyesuaian berhasil dibuat otomatis.');
    }

}
