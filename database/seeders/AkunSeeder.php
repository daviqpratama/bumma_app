<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Akun;

class AkunSeeder extends Seeder
{
    public function run()
    {
        $data = [
            // Aktiva Lancar
            ['nama_akun' => 'Kas', 'tipe' => 'Aktiva', 'kelompok' => 'Aktiva Lancar', 'saldo' => 1500000],
            ['nama_akun' => 'Piutang Usaha', 'tipe' => 'Aktiva', 'kelompok' => 'Aktiva Lancar', 'saldo' => 1200000],
            ['nama_akun' => 'Persediaan Barang Hasil Usaha', 'tipe' => 'Aktiva', 'kelompok' => 'Aktiva Lancar', 'saldo' => 800000],

            // Aktiva Tetap
            ['nama_akun' => 'Tanah Ulayat', 'tipe' => 'Aktiva', 'kelompok' => 'Aktiva Tetap', 'saldo' => 3000000],
            ['nama_akun' => 'Bangunan', 'tipe' => 'Aktiva', 'kelompok' => 'Aktiva Tetap', 'saldo' => 4000000],
            ['nama_akun' => 'Peralatan', 'tipe' => 'Aktiva', 'kelompok' => 'Aktiva Tetap', 'saldo' => 1000000],
            ['nama_akun' => 'Hutan Adat', 'tipe' => 'Aktiva', 'kelompok' => 'Aktiva Tetap', 'saldo' => 2000000],
            ['nama_akun' => 'Sungai', 'tipe' => 'Aktiva', 'kelompok' => 'Aktiva Tetap', 'saldo' => 500000],
            ['nama_akun' => 'Aset Sumber Daya Alam Lainnya', 'tipe' => 'Aktiva', 'kelompok' => 'Aktiva Tetap', 'saldo' => 1000000],

            // Kewajiban
            ['nama_akun' => 'Hutang Usaha', 'tipe' => 'Pasiva', 'kelompok' => 'Kewajiban', 'saldo' => 2000000],
            ['nama_akun' => 'Hutang kepada Pihak Ketiga', 'tipe' => 'Pasiva', 'kelompok' => 'Kewajiban', 'saldo' => 1500000],
            ['nama_akun' => 'Pinjaman Komunitas', 'tipe' => 'Pasiva', 'kelompok' => 'Kewajiban', 'saldo' => 1000000],

            // Ekuitas
            ['nama_akun' => 'Dana Komunitas', 'tipe' => 'Pasiva', 'kelompok' => 'Ekuitas', 'saldo' => 3000000],
            ['nama_akun' => 'Modal Adat', 'tipe' => 'Pasiva', 'kelompok' => 'Ekuitas', 'saldo' => 2000000],
            ['nama_akun' => 'Laba Ditahan', 'tipe' => 'Pasiva', 'kelompok' => 'Ekuitas', 'saldo' => 1000000],
        ];

        Akun::insert($data);
    }
}
