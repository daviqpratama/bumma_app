<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameAkunIdToAkunsIdInSaldoAwalsTable extends Migration
{
    public function up()
    {
        Schema::table('saldo_awals', function (Blueprint $table) {
            $table->renameColumn('akun_id', 'akuns_id');
        });

        // Jika ada tabel lain, misalnya jurnal_umums
        Schema::table('jurnal_umums', function (Blueprint $table) {
            $table->renameColumn('akun_id', 'akuns_id');
        });

        // Tambahkan tabel lain di sini jika perlu
    }

    public function down()
    {
        Schema::table('saldo_awals', function (Blueprint $table) {
            $table->renameColumn('akuns_id', 'akun_id');
        });

        Schema::table('jurnal_umums', function (Blueprint $table) {
            $table->renameColumn('akuns_id', 'akun_id');
        });
    }
}
