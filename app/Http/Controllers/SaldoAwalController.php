<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SaldoAwal;
use App\Models\JurnalUmum;
use App\Models\Akun;

class SaldoAwalController extends Controller
{
    public function index(Request $request)
    {
        $query = SaldoAwal::query();

        if ($request->has('search') && $request->search != '') {
            $query->where('akun', 'like', '%' . $request->search . '%');
        }

        $data = $query->get();

        return view('saldo-awal.index', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'akun' => 'required|string|max:255',
            'debit' => 'nullable|numeric',
            'kredit' => 'nullable|numeric',
        ]);

        // Ambil ID akun dari nama
        $akun = Akun::where('nama', $request->akun)->first();

        if (!$akun) {
            return back()->withErrors(['akun' => 'Akun tidak ditemukan di tabel akuns.']);
        }

        // Simpan ke saldo_awal
        $saldoAwal = SaldoAwal::create([
            'akun_id' => $akun->id, // ✅ tambahkan akun_id
            'akun' => $akun->nama,
            'debit' => $request->debit ?? 0,
            'kredit' => $request->kredit ?? 0,
        ]);

        $kodeJurnal = 'SA-' . now()->format('YmdHis');

        // Simpan ke jurnal umum berdasarkan posisi
        if ($saldoAwal->debit > 0) {
            JurnalUmum::create([
                'tanggal'     => now()->toDateString(),
                'kode_jurnal' => $kodeJurnal,
                'keterangan'  => 'Saldo Awal - ' . $akun->nama,
                'akun_id'     => $akun->id,
                'akun'        => $akun->nama,
                'posisi'      => 'debit',
                'nominal'     => $saldoAwal->debit,
                'ref'         => 'Saldo Awal',
            ]);
        }

        if ($saldoAwal->kredit > 0) {
            JurnalUmum::create([
                'tanggal'     => now()->toDateString(),
                'kode_jurnal' => $kodeJurnal,
                'keterangan'  => 'Saldo Awal - ' . $saldoAwal->akun,
                'akun_id'     => $akun->id,
                'akun'        => $akun->nama,
                'posisi'      => 'kredit',
                'nominal'     => $saldoAwal->kredit,
                'ref'         => '-',
            ]);
        }

        return redirect()->route('saldo-awal.index')->with('success', 'Data saldo awal berhasil disimpan dan dicatat di jurnal umum!');
    }

    public function edit($id)
    {
        $editItem = SaldoAwal::findOrFail($id);
        return view('saldo-awal.edit', compact('editItem'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'akun' => 'required|string|max:255',
            'debit' => 'nullable|numeric',
            'kredit' => 'nullable|numeric',
        ]);

        $saldo = SaldoAwal::findOrFail($id);
        $saldo->update([
            'akun' => $request->akun,
            'debit' => $request->debit ?? 0,
            'kredit' => $request->kredit ?? 0,
        ]);

        return redirect()->route('saldo-awal.index')->with('success', 'Data saldo awal berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $saldo = SaldoAwal::findOrFail($id);
        $saldo->delete();

        return redirect()->route('saldo-awal.index')->with('success', 'Data saldo awal berhasil dihapus!');
    }
}
