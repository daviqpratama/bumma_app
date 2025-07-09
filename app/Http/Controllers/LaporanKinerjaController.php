<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanKinerjaController extends Controller
{
    public function index()
    {
        // Data dummy sementara
        $rasio = [
            'current_ratio' => null,
            'cash_ratio' => null,
            'net_profit_margin' => null,
            'roa' => null,
            'roe' => null,
            'der' => null,
            'kontribusi_sosial' => null,
            'biaya_ekologis' => null
        ];

        return view('laporan-kinerja.index', compact('rasio'));
    }
}
