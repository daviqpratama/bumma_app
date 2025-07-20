<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'kepalaadat',
                'email' => 'kepalaadat@gmail.com',
                'role' => 'admin',
                'email_verified_at' => null,
                'password' => '$2y$10$z8X6kwq1TaaTwX9YoqvrrO3qnNat/KwG/1q..TrfNIq4yoq142W5q',
                'remember_token' => 'P6flf4Ok7JLlYK2FAxeWl6O8p7nurEQ92cFtCCPkhm2Peri2FrdyaDUBtJaS',
                'created_at' => '2025-07-10 04:13:28',
                'updated_at' => '2025-07-10 04:13:28',
            ],
            [
                'id' => 2,
                'name' => 'mayaindah',
                'email' => 'mayaindah@gmail.com',
                'role' => 'user',
                'email_verified_at' => null,
                'password' => '$2y$10$EVgiFrra6lVTjU01vCL7de3TEA/kwUi9mckThY.635frwC6R3.klq',
                'remember_token' => null,
                'created_at' => '2025-07-10 08:51:04',
                'updated_at' => '2025-07-10 08:51:04',
            ],
        ]);
    }
}
