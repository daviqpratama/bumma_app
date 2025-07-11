<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jurnal_umums', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('kode_jurnal'); // kode unik seperti JU001, JP001, dll
            $table->string('keterangan');  // deskripsi transaksi
            $table->unsignedBigInteger('akun_id'); // relasi ke tabel akun
            $table->enum('posisi', ['debit', 'kredit']); // posisi akun
            $table->decimal('nominal', 15, 2); // nilai transaksi
            $table->string('ref')->nullable(); // referensi dari sumber (opsional)
            $table->timestamps();

            $table->unsignedBigInteger('akun_id');
$table->foreign('akun_id')->references('id')->on('akuns');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jurnal_umums');
    }
};
