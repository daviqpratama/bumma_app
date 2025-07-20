<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('jurnal_umums', function (Blueprint $table) {
            // Rename kolom
            if (Schema::hasColumn('jurnal_umums', 'akuns_id')) {
                $table->renameColumn('akuns_id', 'akun_id');
            }
        });
    }

    public function down(): void
    {
        Schema::table('jurnal_umums', function (Blueprint $table) {
            // Balikkan jika perlu
            if (Schema::hasColumn('jurnal_umums', 'akun_id')) {
                $table->renameColumn('akun_id', 'akuns_id');
            }
        });
    }
};
