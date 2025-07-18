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
        Schema::table('transaksis', function (Blueprint $table) {
            if (!Schema::hasColumn('transaksis', 'akun_id')) {
                $table->unsignedBigInteger('akun_id')->nullable()->after('id');

                // Opsional: jika ingin menambahkan foreign key ke tabel akuns
                // $table->foreign('akun_id')->references('id')->on('akuns')->onDelete('set null');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transaksis', function (Blueprint $table) {
            if (Schema::hasColumn('transaksis', 'akun_id')) {
                // Hapus foreign key jika ada
                // $table->dropForeign(['akun_id']);
                $table->dropColumn('akun_id');
            }
        });
    }
};
