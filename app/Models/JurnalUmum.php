<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JurnalUmum extends Model
{
    protected $table = 'jurnal_umum'; // pastikan sesuai nama tabel di database

    protected $fillable = [
        'tanggal',
        'akun1',
        'debit1',
        'akun2',
        'kredit2',
        'keterangan',
        'kode_jurnal'
    ];
}
