<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('kode_transaksi')->unique();
            $table->date('tanggal');
            $table->string('keterangan');
            $table->foreignId('akun_debit')->constrained('akuns')->onDelete('cascade');
            $table->foreignId('akun_kredit')->constrained('akuns')->onDelete('cascade');
            $table->decimal('nominal', 20, 2);
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('transaksis');
    }
};
