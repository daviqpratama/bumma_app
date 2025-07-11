<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    // ⬅️ Ini penting untuk mass-assignment (store otomatis dari controller)
    protected $fillable = [
        'tanggal',
        'keterangan',
        'akun_debit',
        'nominal_debit',
        'akun_kredit',
        'nominal_kredit',
    ];

    // Relasi opsional jika kamu ingin nanti buat relasi dengan JurnalUmum
    // public function jurnal()
    // {
    //     return $this->hasMany(JurnalUmum::class, 'kode_jurnal', 'id');
    // }
}
