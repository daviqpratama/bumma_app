<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AkunSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('akuns')->insert([
            ['id' => 12, 'kode' => '301', 'nama' => 'Modal Pemilik/Modal Disetor', 'jenis' => 'Ekuitas', 'created_at' => '2025-07-18 13:05:25', 'updated_at' => '2025-07-18 13:05:25', 'kategori_arus_kas' => 'Pendanaan'],
            ['id' => 13, 'kode' => '302', 'nama' => 'Laba Ditahan', 'jenis' => 'Ekuitas', 'created_at' => '2025-07-18 13:05:25', 'updated_at' => '2025-07-18 13:05:25', 'kategori_arus_kas' => 'Pendanaan'],
            ['id' => 14, 'kode' => '303', 'nama' => 'Akumulasi Penyusutan', 'jenis' => 'Ekuitas', 'created_at' => '2025-07-18 13:05:25', 'updated_at' => '2025-07-18 13:05:25', 'kategori_arus_kas' => 'Usaha Adat'],
            ['id' => 15, 'kode' => '304', 'nama' => 'Prive', 'jenis' => 'Ekuitas', 'created_at' => '2025-07-18 13:05:25', 'updated_at' => '2025-07-18 13:05:25', 'kategori_arus_kas' => 'Pendanaan'],
            ['id' => 16, 'kode' => '201', 'nama' => 'Utang Usaha', 'jenis' => 'Kewajiban', 'created_at' => '2025-07-18 13:05:33', 'updated_at' => '2025-07-18 13:05:33', 'kategori_arus_kas' => 'Pendanaan'],
            ['id' => 17, 'kode' => '202', 'nama' => 'Utang Gaji', 'jenis' => 'Kewajiban', 'created_at' => '2025-07-18 13:05:33', 'updated_at' => '2025-07-18 13:05:33', 'kategori_arus_kas' => 'Pendanaan'],
            ['id' => 18, 'kode' => '203', 'nama' => 'Pendapatan Diterima di Muka', 'jenis' => 'Kewajiban', 'created_at' => '2025-07-18 13:05:33', 'updated_at' => '2025-07-18 13:05:33', 'kategori_arus_kas' => 'Pendanaan'],
            ['id' => 19, 'kode' => '204', 'nama' => 'Utang Bank/Pinjaman Bank', 'jenis' => 'Kewajiban', 'created_at' => '2025-07-18 13:05:33', 'updated_at' => '2025-07-18 13:05:33', 'kategori_arus_kas' => 'Pendanaan'],
            ['id' => 20, 'kode' => '101', 'nama' => 'Kas', 'jenis' => 'Aset', 'created_at' => '2025-07-18 13:05:40', 'updated_at' => '2025-07-18 13:05:40', 'kategori_arus_kas' => 'Usaha Adat'],
            ['id' => 21, 'kode' => '102', 'nama' => 'Bank', 'jenis' => 'Aset', 'created_at' => '2025-07-18 13:05:40', 'updated_at' => '2025-07-18 13:05:40', 'kategori_arus_kas' => 'Usaha Adat'],
            ['id' => 22, 'kode' => '103', 'nama' => 'Piutang Usaha', 'jenis' => 'Aset', 'created_at' => '2025-07-18 13:05:40', 'updated_at' => '2025-07-18 13:05:40', 'kategori_arus_kas' => 'Usaha Adat'],
            ['id' => 23, 'kode' => '104', 'nama' => 'Persediaan', 'jenis' => 'Aset', 'created_at' => '2025-07-18 13:05:40', 'updated_at' => '2025-07-18 13:05:40', 'kategori_arus_kas' => 'Usaha Adat'],
            ['id' => 24, 'kode' => '105', 'nama' => 'Perlengkapan', 'jenis' => 'Aset', 'created_at' => '2025-07-18 13:05:40', 'updated_at' => '2025-07-18 13:05:40', 'kategori_arus_kas' => 'Usaha Adat'],
            ['id' => 25, 'kode' => '106', 'nama' => 'Sewa Dibayar di Muka', 'jenis' => 'Aset', 'created_at' => '2025-07-18 13:05:40', 'updated_at' => '2025-07-18 13:05:40', 'kategori_arus_kas' => 'Usaha Adat'],
            ['id' => 26, 'kode' => '107', 'nama' => 'Asuransi Dibayar di Muka', 'jenis' => 'Aset', 'created_at' => '2025-07-18 13:05:40', 'updated_at' => '2025-07-18 13:05:40', 'kategori_arus_kas' => 'Usaha Adat'],
            ['id' => 27, 'kode' => '108', 'nama' => 'Tanah', 'jenis' => 'Aset', 'created_at' => '2025-07-18 13:05:40', 'updated_at' => '2025-07-18 13:05:40', 'kategori_arus_kas' => 'Usaha Adat'],
            ['id' => 28, 'kode' => '109', 'nama' => 'Bangunan', 'jenis' => 'Aset', 'created_at' => '2025-07-18 13:05:40', 'updated_at' => '2025-07-18 13:05:40', 'kategori_arus_kas' => 'Usaha Adat'],
            ['id' => 29, 'kode' => '110', 'nama' => 'Peralatan', 'jenis' => 'Aset', 'created_at' => '2025-07-18 13:05:40', 'updated_at' => '2025-07-18 13:05:40', 'kategori_arus_kas' => 'Usaha Adat'],
            ['id' => 30, 'kode' => '401', 'nama' => 'Beban Perlengkapan', 'jenis' => 'Beban', 'created_at' => '2025-07-18 17:35:13', 'updated_at' => '2025-07-18 17:35:13', 'kategori_arus_kas' => 'Usaha Adat'],
            ['id' => 31, 'kode' => '402', 'nama' => 'Beban Sewa', 'jenis' => 'Beban', 'created_at' => '2025-07-18 17:35:13', 'updated_at' => '2025-07-18 17:35:13', 'kategori_arus_kas' => 'Usaha Adat'],
            ['id' => 32, 'kode' => '403', 'nama' => 'Beban Asuransi', 'jenis' => 'Beban', 'created_at' => '2025-07-18 17:35:13', 'updated_at' => '2025-07-18 17:35:13', 'kategori_arus_kas' => 'Usaha Adat'],
            ['id' => 33, 'kode' => '404', 'nama' => 'Beban Penyusutan', 'jenis' => 'Beban', 'created_at' => '2025-07-18 17:35:13', 'updated_at' => '2025-07-18 17:35:13', 'kategori_arus_kas' => 'Usaha Adat'],
            ['id' => 34, 'kode' => '311', 'nama' => 'Dana Komunitas', 'jenis' => 'Ekuitas', 'created_at' => '2025-07-18 18:49:33', 'updated_at' => '2025-07-18 18:50:42', 'kategori_arus_kas' => 'Sosial & Ritual'],
            ['id' => 35, 'kode' => '112', 'nama' => 'Aset Tetap', 'jenis' => 'Aset', 'created_at' => '2025-07-18 18:49:33', 'updated_at' => '2025-07-18 18:50:42', 'kategori_arus_kas' => 'Usaha Adat'],
            ['id' => 36, 'kode' => '511', 'nama' => 'Distribusi kepada Masyarakat', 'jenis' => 'Beban', 'created_at' => '2025-07-18 18:49:33', 'updated_at' => '2025-07-18 18:50:42', 'kategori_arus_kas' => 'Sosial & Ritual'],
            ['id' => 37, 'kode' => '611', 'nama' => 'Biaya Ritual & Ekosistem', 'jenis' => 'Beban', 'created_at' => '2025-07-18 18:49:33', 'updated_at' => '2025-07-18 18:50:42', 'kategori_arus_kas' => '-'],
            ['id' => 43, 'kode' => '701', 'nama' => 'Penjualan Produk Adat', 'jenis' => 'Pendapatan', 'created_at' => '2025-07-19 00:33:02', 'updated_at' => '2025-07-19 00:33:02', 'kategori_arus_kas' => '-'],
            ['id' => 44, 'kode' => '702', 'nama' => 'Jasa Ekosistem', 'jenis' => 'Pendapatan', 'created_at' => '2025-07-19 00:33:02', 'updated_at' => '2025-07-19 00:33:02', 'kategori_arus_kas' => '-'],
            ['id' => 45, 'kode' => '703', 'nama' => 'Hasil Hutan Non-Kayu', 'jenis' => 'Pendapatan', 'created_at' => '2025-07-19 00:33:02', 'updated_at' => '2025-07-19 00:33:02', 'kategori_arus_kas' => '-'],
            ['id' => 46, 'kode' => '704', 'nama' => 'Donasi / Hibah', 'jenis' => 'Pendapatan', 'created_at' => '2025-07-19 00:33:03', 'updated_at' => '2025-07-19 00:33:03', 'kategori_arus_kas' => '-'],
        ]);
    }
}
