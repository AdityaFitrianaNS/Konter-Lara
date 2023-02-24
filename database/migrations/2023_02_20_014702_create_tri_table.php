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
        Schema::create('tri', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('nama', 50)->unique();
            $table->string('slug', 50)->unique();
            $table->string('merk', 50);
            $table->string('kategori', 50);
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
        Schema::dropIfExists('tri');
    }
};
