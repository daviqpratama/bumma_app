<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BukuBesar extends Model
{
    protected $table = 'buku_besar';

    protected $fillable = [
        'akun_id',
        'tanggal',
        'keterangan',
        'debit',
        'kredit',
        'saldo',
    ];

    public function akun()
    {
        return $this->belongsTo(Akun::class);
    }
}
