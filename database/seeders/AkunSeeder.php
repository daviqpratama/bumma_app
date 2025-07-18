<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Akun;

class AkunSeeder extends Seeder
{
    public function run()
    {
         $this->call(AkunSeeder::class);
        Akun::create(['kode' => '111', 'nama' => 'Kas']);
        Akun::create(['kode' => '112', 'nama' => 'Peralatan']);
        Akun::create(['kode' => '211', 'nama' => 'Utang']);
        Akun::create(['kode' => '311', 'nama' => 'Modal']);
        Akun::create(['kode' => '411', 'nama' => 'Pendapatan']);
        Akun::create(['kode' => '511', 'nama' => 'Beban']);
        $this->call(AkunSeeder::class);

    }
}
