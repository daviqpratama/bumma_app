<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaldoAwal extends Model
{
    use HasFactory;
    protected $fillable = ['akun_id', 'akun', 'debit', 'kredit'];
}
