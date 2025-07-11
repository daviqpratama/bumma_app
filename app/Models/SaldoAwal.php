<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaldoAwal extends Model
{
    use HasFactory;

    // ✅ Izinkan mass assignment pada field-field ini
    protected $fillable = ['akun', 'debit', 'kredit'];
}
