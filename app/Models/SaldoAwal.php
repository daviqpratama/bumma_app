<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaldoAwal extends Model
{
    use HasFactory;

    protected $fillable = ['akuns_id', 'debit', 'kredit'];

    public function akun()
    {
        return $this->belongsTo(Akun::class, 'akun_id');
    }
}
