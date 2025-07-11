<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\JurnalUmum;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $data = Transaksi::orderBy('tanggal')->get();
        return view('transaksi.index', compact('data'));
    }

    public function create()
    {
        return view('transaksi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'keterangan' => 'required|string|max:255',
            'akun_debit' => 'required|string',
            'nominal_debit' => 'required|numeric',
            'akun_kredit' => 'required|string',
            'nominal_kredit' => 'required|numeric',
        ]);

        $transaksi = Transaksi::create($request->all());

        // Otomatis input ke jurnal umum
        $kodeJurnal = 'TRX' . str_pad($transaksi->id, 4, '0', STR_PAD_LEFT);

        JurnalUmum::create([
            'tanggal' => $request->tanggal,
            'kode_jurnal' => $kodeJurnal,
            'keterangan' => $request->keterangan,
            'akun' => $request->akun_debit,
            'debit' => $request->nominal_debit,
            'kredit' => 0,
            'ref' => null,
        ]);

        JurnalUmum::create([
            'tanggal' => $request->tanggal,
            'kode_jurnal' => $kodeJurnal,
            'keterangan' => $request->keterangan,
            'akun' => $request->akun_kredit,
            'debit' => 0,
            'kredit' => $request->nominal_kredit,
            'ref' => null,
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil disimpan!');
    }
}
