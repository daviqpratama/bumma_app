<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksis'; // Sesuaikan dengan nama tabel di database

    protected $fillable = [
        'tanggal',
        'keterangan',
        'akun_debit',
        'nominal_debit',
        'akun_kredit',
        'nominal_kredit',
    ];

    /**
     * Relasi ke akun debit
     */
    public function akunDebit()
    {
        return $this->belongsTo(Akun::class, 'akun_debit');
    }

    /**
     * Relasi ke akun kredit
     */
    public function akunKredit()
    {
        return $this->belongsTo(Akun::class, 'akun_kredit');
    }
    // App\Models\Transaksi.php
public function akun()
{
    return $this->belongsTo(Akun::class);
}

}
