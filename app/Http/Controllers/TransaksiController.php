<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\JurnalUmum;
use App\Models\BukuBesar;
use App\Models\Akun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::orderBy('tanggal')->get();
        return view('transaksi.index', compact('transaksis'));
    }

    public function create()
    {
        $akunDebit = Akun::where('jenis', 'Aset')->get();
        $akunKredit = Akun::whereIn('jenis', ['Kewajiban', 'Ekuitas', 'Pendapatan'])->get();

        return view('transaksi.create', compact('akunDebit', 'akunKredit'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'keterangan' => 'required|string|max:255',
            'akun_debit' => 'required|integer|exists:akuns,id',
            'nominal_debit' => 'required|numeric',
            'akun_kredit' => 'required|integer|exists:akuns,id',
            'nominal_kredit' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            $akunDebit = Akun::where('jenis', 'Aset')->get();
            $akunKredit = Akun::whereIn('jenis', ['Kewajiban', 'Ekuitas', 'Pendapatan'])->get();

            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with(compact('akunDebit', 'akunKredit'));
        }

        $akunDebit = Akun::findOrFail($request->akun_debit);
        $akunKredit = Akun::findOrFail($request->akun_kredit);

        $transaksi = Transaksi::create([
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan,
            'akun_debit' => $akunDebit->id,
            'nominal_debit' => $request->nominal_debit,
            'akun_kredit' => $akunKredit->id,
            'nominal_kredit' => $request->nominal_kredit,
        ]);

        $kodeJurnal = 'TRX' . str_pad($transaksi->id, 4, '0', STR_PAD_LEFT);

        $ref = 'Transaksi';

        JurnalUmum::create([
            'tanggal' => $request->tanggal,
            'kode_jurnal' => $kodeJurnal,
            'keterangan' => $request->keterangan,
            'akun_id' => $akunDebit->id,
            'posisi' => 'debit',
            'nominal' => $request->nominal_debit,
            'ref' => $ref,
        ]);

        JurnalUmum::create([
            'tanggal' => $request->tanggal,
            'kode_jurnal' => $kodeJurnal,
            'keterangan' => $request->keterangan,
            'akun_id' => $akunKredit->id,
            'posisi' => 'kredit',
            'nominal' => $request->nominal_kredit,
            'ref' => $ref,
        ]);

        BukuBesar::create([
            'akun_id' => $akunDebit->id,
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan,
            'debit' => $request->nominal_debit,
            'kredit' => 0,
            'saldo' => $this->hitungSaldoBaru($akunDebit->id, $request->nominal_debit, 0),
        ]);

        BukuBesar::create([
            'akun_id' => $akunKredit->id,
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan,
            'debit' => 0,
            'kredit' => $request->nominal_kredit,
            'saldo' => $this->hitungSaldoBaru($akunKredit->id, 0, $request->nominal_kredit),
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil disimpan!');
    }

    private function hitungSaldoBaru($akun_id, $debit, $kredit)
    {
        $saldoSebelumnya = BukuBesar::where('akun_id', $akun_id)
            ->orderBy('tanggal', 'desc')
            ->orderBy('id', 'desc')
            ->first();

        $saldo = $saldoSebelumnya ? $saldoSebelumnya->saldo : 0;
        $saldo += $debit;
        $saldo -= $kredit;

        return $saldo;
    }
}
