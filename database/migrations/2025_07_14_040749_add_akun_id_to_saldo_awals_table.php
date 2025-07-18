<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('saldo_awals', function (Blueprint $table) {
            $table->unsignedBigInteger('akun_id')->after('id');
            // Jika ingin pakai foreign key bisa aktifkan baris ini:
            // $table->foreign('akun_id')->references('id')->on('akuns')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('saldo_awals', function (Blueprint $table) {
            $table->dropColumn('akun_id');
        });
    }
};
