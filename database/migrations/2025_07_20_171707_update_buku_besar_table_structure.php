<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateBukuBesarTableStructure extends Migration
{
    public function up()
    {
        Schema::table('buku_besar', function (Blueprint $table) {
            // Drop kolom lama jika ada
            if (Schema::hasColumn('buku_besar', 'ref')) {
                $table->dropColumn('ref');
            }
            if (Schema::hasColumn('buku_besar', 'posisi')) {
                $table->dropColumn('posisi');
            }
            if (Schema::hasColumn('buku_besar', 'nominal')) {
                $table->dropColumn('nominal');
            }

            // Tambahkan kolom baru
            if (!Schema::hasColumn('buku_besar', 'debit')) {
                $table->decimal('debit', 15, 2)->default(0);
            }
            if (!Schema::hasColumn('buku_besar', 'kredit')) {
                $table->decimal('kredit', 15, 2)->default(0);
            }
            if (!Schema::hasColumn('buku_besar', 'saldo')) {
                $table->decimal('saldo', 15, 2)->default(0);
            }
        });
    }

    public function down()
    {
        Schema::table('buku_besar', function (Blueprint $table) {
            $table->dropColumn(['debit', 'kredit', 'saldo']);

            // Tambahkan kembali kolom lama jika perlu (optional)
            $table->string('ref')->nullable();
            $table->string('posisi')->nullable();
            $table->decimal('nominal', 15, 2)->nullable();
        });
    }
}
