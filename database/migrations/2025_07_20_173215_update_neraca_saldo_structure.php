<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('neraca_saldo', function (Blueprint $table) {
            // Drop kolom yang tidak sesuai
            if (Schema::hasColumn('neraca_saldo', 'debit')) $table->dropColumn('debit');
            if (Schema::hasColumn('neraca_saldo', 'kredit')) $table->dropColumn('kredit');

            // Tambah atau ubah kolom agar sesuai struktur
            if (!Schema::hasColumn('neraca_saldo', 'tanggal')) {
                $table->date('tanggal')->nullable()->after('akun_id');
            }

            if (!Schema::hasColumn('neraca_saldo', 'saldo_awal')) {
                $table->decimal('saldo_awal', 15, 2)->default(0)->after('tanggal');
            }

            if (!Schema::hasColumn('neraca_saldo', 'transaksi_keuangan')) {
                $table->decimal('transaksi_keuangan', 15, 2)->default(0)->after('saldo_awal');
            }

            if (!Schema::hasColumn('neraca_saldo', 'saldo_akhir')) {
                $table->decimal('saldo_akhir', 15, 2)->default(0)->after('transaksi_keuangan');
            }
        });
    }

    public function down(): void
    {
        Schema::table('neraca_saldo', function (Blueprint $table) {
            $table->dropColumn(['tanggal', 'saldo_awal', 'transaksi_keuangan', 'saldo_akhir']);

            // Tambahkan kembali debit dan kredit jika perlu
            $table->decimal('debit', 15, 2)->default(0);
            $table->decimal('kredit', 15, 2)->default(0);
        });
    }
};
