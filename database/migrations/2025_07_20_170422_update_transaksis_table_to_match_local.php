<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('transaksis', function (Blueprint $table) {
            // Drop kolom yang tidak dipakai jika ada
            if (Schema::hasColumn('transaksis', 'kode_transaksi')) {
                $table->dropColumn('kode_transaksi');
            }
            if (Schema::hasColumn('transaksis', 'nominal')) {
                $table->dropColumn('nominal');
            }

            // Tambahkan kolom yang sesuai dengan struktur lokal
            if (!Schema::hasColumn('transaksis', 'akun_id')) {
                $table->unsignedBigInteger('akun_id')->nullable()->after('id');
            }
            if (!Schema::hasColumn('transaksis', 'nominal_debit')) {
                $table->decimal('nominal_debit', 15, 2)->default(0)->after('akun_debit');
            }
            if (!Schema::hasColumn('transaksis', 'nominal_kredit')) {
                $table->decimal('nominal_kredit', 15, 2)->default(0)->after('akun_kredit');
            }
        });
    }

    public function down(): void
    {
        Schema::table('transaksis', function (Blueprint $table) {
            $table->dropColumn(['akun_id', 'nominal_debit', 'nominal_kredit']);

            $table->string('kode_transaksi')->nullable();
            $table->decimal('nominal', 15, 2)->default(0);
        });
    }
};
