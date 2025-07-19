<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akun extends Model
{
    use HasFactory;

    protected $fillable = ['kode', 'nama', 'jenis'];

    public function transaksis()
    {
        return $this->hasMany(Transaksi::class);
    }

    public function saldoAwals()
    {
        return $this->hasMany(SaldoAwal::class, 'akuns_id');
    }

        public function jurnalUmum()
    {
        return $this->hasMany(JurnalUmum::class, 'akun_id');
    }
}
