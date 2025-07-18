<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Akun;

class JurnalUmum extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal',
        'kode_jurnal',
        'keterangan',
        'akun_id',
        'posisi',
        'nominal',
        'ref',
    ];

    public function akun()
    {
        return $this->belongsTo(Akun::class, 'akun_id', 'id');
    }
}
