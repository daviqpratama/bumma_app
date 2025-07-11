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
        Schema::table('jurnal_umums', function (Blueprint $table) {
            $table->unsignedBigInteger('akun_id')->nullable()->change();
            $table->decimal('nominal', 15, 2)->nullable()->change(); // <- ini ditambahkan
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jurnal_umums', function (Blueprint $table) {
            // Opsional: Balikin ke tidak nullable, kalau memang perlu.
            // $table->unsignedBigInteger('akun_id')->nullable(false)->change();
            // $table->decimal('nominal', 15, 2)->nullable(false)->change();
        });
    }
};
