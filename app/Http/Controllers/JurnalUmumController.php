<?php

namespace App\Http\Controllers;

use App\Models\JurnalUmum;
use Illuminate\Http\Request;

class JurnalUmumController extends Controller
{
    public function index()
    {
        $jurnals = JurnalUmum::with('akun')
            ->orderBy('tanggal')
            ->orderBy('kode_jurnal')
            ->get();

        return view('jurnal-umum.index', compact('jurnals'));
    }
}
