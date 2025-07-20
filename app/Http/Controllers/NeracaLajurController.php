<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Akun;
use App\Models\SaldoAwal;
use App\Models\Transaksi;
use App\Models\JurnalUmum;

class NeracaLajurController extends Controller
{
    public function index(Request $request)
    {
        $tanggal = $request->tanggal;
        $namaAkun = $request->nama_akun;

        $akuns = Akun::when($namaAkun, function ($query, $namaAkun) {
            return $query->where('nama', 'like', '%' . $namaAkun . '%');
        })->get();

        $data = [];

        foreach ($akuns as $akun) {
            $saldoAwalDebit = $akun->saldoAwals()->sum('debit');
            $saldoAwalKredit = $akun->saldoAwals()->sum('kredit');
            $saldoAwal = $saldoAwalDebit - $saldoAwalKredit;

            $transaksiQueryDebit = Transaksi::where('akun_debit', $akun->id);
            $transaksiQueryKredit = Transaksi::where('akun_kredit', $akun->id);
            $jurnalQuery = JurnalUmum::where('akun_id', $akun->id)->where('ref', 'Penyesuaian');

            if ($tanggal) {
                $transaksiQueryDebit->whereDate('tanggal', '<=', $tanggal);
                $transaksiQueryKredit->whereDate('tanggal', '<=', $tanggal);
                $jurnalQuery->whereDate('tanggal', '<=', $tanggal);
            }

            $debitTransaksi = $transaksiQueryDebit->sum('nominal_debit');
            $kreditTransaksi = $transaksiQueryKredit->sum('nominal_kredit');

            $debitPenyesuaian = (clone $jurnalQuery)->where('posisi', 'debit')->sum('nominal');
            $kreditPenyesuaian = (clone $jurnalQuery)->where('posisi', 'kredit')->sum('nominal');

            $debit = $debitTransaksi + $debitPenyesuaian;
            $kredit = $kreditTransaksi + $kreditPenyesuaian;

            $saldoAkhir = $saldoAwal + $debit - $kredit;

            if ($saldoAwal != 0 || $debit != 0 || $kredit != 0) {
                $data[] = [
                    'nama' => $akun->nama,
                    'awal' => $saldoAwal,
                    'debit' => $debit,
                    'kredit' => $kredit,
                    'akhir' => $saldoAkhir,
                    'status' => 'Selesai',
                ];
            }
        }

        return view('neraca-lajur.index', compact('data', 'tanggal', 'namaAkun'));
    }
}
