<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JurnalUmumController extends Controller
{
    public function index()
    {
        $jurnals = [
            (object)[
                'tanggal' => '2024-04-15',
                'kode_jurnal' => 'JRN0001',
                'keterangan' => 'Pembelian alat kantor',
                'akun1' => 'Aset Tetap Peralatan',
                'debit1' => 1000000,
                'ref1' => 'A001',
                'akun2' => 'Kas',
                'kredit2' => 1000000,
                'ref2' => 'A101',
            ],
            (object)[
                'tanggal' => '2024-01-03',
                'kode_jurnal' => 'JRN0002',
                'keterangan' => 'Penerimaan pendapatan jasa',
                'akun1' => 'Kas',
                'debit1' => 2500000,
                'ref1' => 'A101',
                'akun2' => 'Pendapatan Jasa',
                'kredit2' => 2500000,
                'ref2' => 'P201',
            ],
            (object)[
                'tanggal' => '2024-01-05',
                'kode_jurnal' => 'JRN0003',
                'keterangan' => 'Pembayaran listrik',
                'akun1' => 'Beban Listrik',
                'debit1' => 750000,
                'ref1' => 'B301',
                'akun2' => 'Kas',
                'kredit2' => 750000,
                'ref2' => 'A101',
            ],
            (object)[
                'tanggal' => '2024-01-10',
                'kode_jurnal' => 'JRN0005',
                'keterangan' => 'Pembayaran gaji',
                'akun1' => 'Beban Gaji',
                'debit1' => 3000000,
                'ref1' => 'B302',
                'akun2' => 'Kas',
                'kredit2' => 3000000,
                'ref2' => 'A101',
            ],
            (object)[
                'tanggal' => '2025-01-12',
                'kode_jurnal' => 'JRN0006',
                'keterangan' => 'Penjualan produk tunai',
                'akun1' => 'Kas',
                'debit1' => 4000000,
                'ref1' => 'A101',
                'akun2' => 'Pendapatan Penjualan',
                'kredit2' => 4000000,
                'ref2' => 'P202',
            ],
            (object)[
                'tanggal' => '2025-02-02',
                'kode_jurnal' => 'JRN0007',
                'keterangan' => 'Pembelian bahan baku',
                'akun1' => 'Persediaan Bahan Baku',
                'debit1' => 1500000,
                'ref1' => 'A002',
                'akun2' => 'Utang Dagang',
                'kredit2' => 1500000,
                'ref2' => 'L201',
            ],
            (object)[
                'tanggal' => '2025-02-10',
                'kode_jurnal' => 'JRN0008',
                'keterangan' => 'Pembayaran utang dagang',
                'akun1' => 'Utang Dagang',
                'debit1' => 1500000,
                'ref1' => 'L201',
                'akun2' => 'Kas',
                'kredit2' => 1500000,
                'ref2' => 'A101',
            ],
            (object)[
                'tanggal' => '2025-03-01',
                'kode_jurnal' => 'JRN0009',
                'keterangan' => 'Penerimaan piutang usaha',
                'akun1' => 'Kas',
                'debit1' => 2000000,
                'ref1' => 'A101',
                'akun2' => 'Piutang Usaha',
                'kredit2' => 2000000,
                'ref2' => 'A201',
            ],
        ];

        return view('jurnal-umum.index', compact('jurnals'));
    }
}
