<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SaldoAwal;
use App\Models\JurnalUmum;

class SaldoAwalController extends Controller
{
    public function index(Request $request)
    {
        $query = SaldoAwal::query();

        // Tambahkan filter jika ada pencarian
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

        // Simpan ke Saldo Awal
        $saldoAwal = SaldoAwal::create([
            'akun' => $request->akun,
            'debit' => $request->debit ?? 0,
            'kredit' => $request->kredit ?? 0,
        ]);

        // Buat kode jurnal otomatis
$kodeJurnal = 'SA-' . now()->format('YmdHis');

// Simpan ke Jurnal Umum (jika nominalnya bukan 0)
if ($saldoAwal->debit > 0) {
    JurnalUmum::create([
        'tanggal' => now()->toDateString(),
        'kode_jurnal' => $kodeJurnal,
        'keterangan' => 'Saldo Awal - ' . $saldoAwal->akun,
        'akun_id' => $request->akun, // GANTI INI
        'ref' => '-',
        'debit' => $saldoAwal->debit,
        'kredit' => 0,
    ]);
} elseif ($saldoAwal->kredit > 0) {
    JurnalUmum::create([
    'tanggal' => now()->toDateString(),
    'kode_jurnal' => $kodeJurnal,
    'keterangan' => 'Saldo Awal - ' . $saldoAwal->akun,
    'akun_id' => $akunId, // Pastikan ini ID, bukan nama
    'ref' => '-',
    'debit' => $saldoAwal->debit,
    'kredit' => $saldoAwal->kredit,
    'nominal' => $saldoAwal->debit + $saldoAwal->kredit,
]);



        } elseif ($saldoAwal->kredit > 0) {
           JurnalUmum::create([
    'tanggal' => now()->toDateString(),
    'kode_jurnal' => $kodeJurnal,
    'keterangan' => 'Saldo Awal - ' . $saldoAwal->akun,
    'akun' => $saldoAwal->akun, // <- pakai ini
    'ref' => '-',
    'debit' => $saldoAwal->debit,
    'kredit' => $saldoAwal->kredit,
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
