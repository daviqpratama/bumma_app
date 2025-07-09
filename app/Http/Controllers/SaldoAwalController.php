<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SaldoAwalController extends Controller
{
    public function index()
    {
        $akun = [
            ['nama' => 'Kas'],
            ['nama' => 'Piutang Usaha'],
            ['nama' => 'Persediaan Barang Hasil Usaha'],
            ['nama' => 'Tanah Ulayat'],
            ['nama' => 'Bangunan'],
            ['nama' => 'Peralatan'],
            ['nama' => 'Hutan Adat'],
        ];

        return view('saldo-awal.index', compact('akun'));
    }
}
