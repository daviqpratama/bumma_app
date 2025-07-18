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
        $query = SaldoAwal::with('akun');

        if ($request->has('search') && $request->search != '') {
            $query->whereHas('akun', function ($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->search . '%');
            });
        }

        $data = $query->get();

        return view('saldo-awal.index', compact('data'));
    }

    public function create()
    {
        $akuns = Akun::all();
        return view('saldo-awal.create', compact('akuns'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'akuns_id' => 'required|exists:akuns,id',
            'debit' => 'nullable|numeric',
            'kredit' => 'nullable|numeric',
        ]);

        $akun = Akun::findOrFail($request->akuns_id);

        $saldoAwal = SaldoAwal::create([
            'akuns_id' => $akun->id,
            'debit' => $request->debit ?? 0,
            'kredit' => $request->kredit ?? 0,
        ]);

        $kodeJurnal = 'SA-' . now()->format('YmdHis');

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
                'keterangan'  => 'Saldo Awal - ' . $akun->nama,
                'akun_id'     => $akun->id,
                'akun'        => $akun->nama,
                'posisi'      => 'kredit',
                'nominal'     => $saldoAwal->kredit,
                'ref'         => 'Saldo Awal',
            ]);
        }

        return redirect()->route('saldo-awal.index')->with('success', 'Data saldo awal berhasil disimpan dan dicatat di jurnal umum!');
    }

    public function edit($id)
    {
        $editItem = SaldoAwal::findOrFail($id);
        $akuns = Akun::all();
        return view('saldo-awal.edit', compact('editItem', 'akuns'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'akuns_id' => 'required|exists:akuns,id',
            'debit' => 'nullable|numeric',
            'kredit' => 'nullable|numeric',
        ]);

        $saldo = SaldoAwal::findOrFail($id);
        $saldo->update([
            'akuns_id' => $request->akuns_id,
            'debit' => $request->debit ?? 0,
            'kredit' => $request->kredit ?? 0,
        ]);

        return redirect()->route('saldo-awal.index')->with('success', 'Data saldo awal berhasil diperbarui!');
    }

        public function destroy($id)
    {
        $saldo = SaldoAwal::findOrFail($id);

        // Hapus jurnal umum yang terkait dengan saldo awal ini
        JurnalUmum::where('akun_id', $saldo->akuns_id)
            ->where('ref', 'Saldo Awal')
            ->delete();

        $saldo->delete();

        return redirect()->route('saldo-awal.index')->with('success', 'Data saldo awal dan jurnal umumnya berhasil dihapus!');
    }

}
