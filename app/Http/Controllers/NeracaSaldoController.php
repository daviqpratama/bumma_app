<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NeracaSaldoController extends Controller
{
    public function index()
    {
        $data = [
            'Aset' => [
                [
                    'nama' => 'Kas',
                    'saldo_awal' => 100000,
                    'transaksi' => 20000,
                ],
                [
                    'nama' => 'Piutang Usaha',
                    'saldo_awal' => 50000,
                    'transaksi' => 10000,
                ],
                [
                    'nama' => 'Persediaan',
                    'saldo_awal' => 30000,
                    'transaksi' => 15000,
                ],
                [
                    'nama' => 'Aset Tetap',
                    'saldo_awal' => 150000,
                    'transaksi' => 0,
                ],
            ],
            'Kewajiban' => [
                [
                    'nama' => 'Utang Usaha',
                    'saldo_awal' => 20000,
                    'transaksi' => 5000,
                ]
            ],
            'Ekuitas' => [
                [
                    'nama' => 'Modal',
                    'saldo_awal' => 120000,
                    'transaksi' => 0,
                ],
                [
                    'nama' => 'Laba Ditahan',
                    'saldo_awal' => 10000,
                    'transaksi' => 2000,
                ]
            ],
        ];

        return view('neraca-saldo.index', compact('data'));
    }
}
