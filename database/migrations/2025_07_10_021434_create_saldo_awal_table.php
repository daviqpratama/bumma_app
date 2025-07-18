<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('saldo_awals', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('akun_id');  // relasi ke akun
    $table->decimal('debit', 15, 2)->default(0);
    $table->decimal('kredit', 15, 2)->default(0);
    $table->timestamps();

    $table->foreign('akun_id')->references('id')->on('akuns')->onDelete('cascade');
});

    }

    public function down(): void
    {
        Schema::dropIfExists('saldo_awals');
    }
};
