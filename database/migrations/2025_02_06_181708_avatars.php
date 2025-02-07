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
        // Tabel avatars untuk menyimpan daftar avatar
        Schema::create('avatars', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // Nama avatar (opsional)
            $table->string('path'); // Path lokasi penyimpanan avatar
            $table->integer('leaflet_reward')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avatars');
    }
};
