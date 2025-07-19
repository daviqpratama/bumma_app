<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use App\Models\JurnalUmum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NeracaSaldoController extends Controller
{
    public function index(Request $request)
    {
        $tanggal = $request->input('tanggal', now()->toDateString());
        $akuns = Akun::all();

        $data = [
            'Aset' => [],
            'Kewajiban' => [],
            'Ekuitas' => [],
            'Beban' => [],
            'Pendapatan' => [],
        ];

        $total = [
            'Aset' => 0,
            'Kewajiban' => 0,
            'Ekuitas' => 0,
            'Beban' => 0,
            'Pendapatan' => 0,

        ];

        foreach ($akuns as $akun) {
            // Ambil saldo awal dari tabel saldo_awals
            $saldoAwalData = DB::table('saldo_awals')
                ->where('akuns_id', $akun->id)
                ->first();

            $saldo_awal = ($saldoAwalData->debit ?? 0) - ($saldoAwalData->kredit ?? 0);

            // Ambil transaksi dari jurnal umum sampai tanggal tertentu
            $transaksi = JurnalUmum::where('akun_id', $akun->id)
                ->whereDate('tanggal', '<=', $tanggal)
                ->get();

            $total_debit = $transaksi->where('posisi', 'debit')->sum('nominal');
            $total_kredit = $transaksi->where('posisi', 'kredit')->sum('nominal');

            // Hitung transaksi dan saldo akhir
            $transaksi_keuangan = $akun->jenis === 'Aset'
                ? $total_debit - $total_kredit
                : $total_kredit - $total_debit;

            $saldo_akhir = $saldo_awal + $transaksi_keuangan;

            $data[$akun->jenis][] = [
                'nama' => $akun->nama,
                'saldo_awal' => $saldo_awal,
                'transaksi_keuangan' => $transaksi_keuangan,
                'saldo_akhir' => $saldo_akhir,
            ];

            $total[$akun->jenis] += $saldo_akhir;
        }

        return view('neraca-saldo.index', compact('data', 'total', 'tanggal'));
    }
}
