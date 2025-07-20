<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('jurnal_umums', function (Blueprint $table) {
            $table->id();
            $table->string('kode_jurnal');
            $table->foreignId('akun_id')->constrained('akuns')->onDelete('cascade');
            $table->date('tanggal');
            $table->string('keterangan');
            $table->string('ref')->nullable();
            $table->enum('posisi', ['debit', 'kredit']);
            $table->decimal('nominal', 20, 2);
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('jurnal_umums');
    }
};
