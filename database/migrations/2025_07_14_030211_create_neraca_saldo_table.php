<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('neraca_saldo', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('akun_id');
            $table->date('tanggal')->nullable();
            $table->decimal('saldo_awal', 15, 2)->default(0);
            $table->decimal('transaksi_keuangan', 15, 2)->default(0);
            $table->decimal('saldo_akhir', 15, 2)->default(0);
            $table->timestamps();

            $table->foreign('akun_id')->references('id')->on('akuns')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('neraca_saldo');
    }
};
