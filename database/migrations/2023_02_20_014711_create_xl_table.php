<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('xl', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('nama', 50);
            $table->string('jenis', 50);
            $table->string('masa_aktif', 30);
            $table->integer('harga_asli');
            $table->integer('harga_jual');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('xl');
    }
};
