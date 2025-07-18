<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TransaksiSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('transaksis')->insert([
            [
                'akun_id' => 1, // sesuaikan ID akun kas kamu
                'debit' => 100000,
                'kredit' => 0,
                'tanggal' => Carbon::now()->toDateString(),
            ],
            [
                'akun_id' => 1,
                'debit' => 0,
                'kredit' => 50000,
                'tanggal' => Carbon::now()->toDateString(),
            ],
        ]);
    }
}
