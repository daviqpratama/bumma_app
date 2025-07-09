<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NeracaLajurController extends Controller
{
    public function index()
    {
        $data = [
            [
                'nama' => 'Piutang Usaha',
                'awal' => 50000000,
                'debit' => 30000000,
                'kredit' => 20000000,
                'akhir' => 60000000,
                'status' => 'Selesai'
            ],
            [
                'nama' => 'Utang Usaha',
                'awal' => 20000000,
                'debit' => 5000000,
                'kredit' => 15000000,
                'akhir' => 10000000,
                'status' => 'Selesai'
            ],
            [
                'nama' => 'Modal',
                'awal' => 120000000,
                'debit' => 20000000,
                'kredit' => 10000000,
                'akhir' => 130000000,
                'status' => 'Selesai'
            ],
        ];

        return view('neraca-lajur.index', compact('data'));
    }
}
