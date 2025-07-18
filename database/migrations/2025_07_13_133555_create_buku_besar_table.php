<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buku_besar', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('akun_id'); // relasi ke tabel akun
            $table->date('tanggal');
            $table->string('keterangan')->nullable();
            $table->decimal('debit', 15, 2)->default(0);
            $table->decimal('kredit', 15, 2)->default(0);
            $table->decimal('saldo', 15, 2)->default(0);
            $table->timestamps();

            // relasi ke tabel 'akuns'
            $table->foreign('akun_id')->references('id')->on('akuns')->onDelete('cascade');
        });
    }

    /**
     * Rollback migrasi.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buku_besar');
    }
};
