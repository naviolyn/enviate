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
        Schema::create('badges', function (Blueprint $table) {
            $table->id('badge_id');
            $table->string('name', 50);
            $table->text('description');
            $table->string('image_path')->nullable(); // Menyimpan path gambar
            $table->integer('required_level')->default(1); // Level minimal untuk mengakses
            $table->timestamp('created_at')->useCurrent();
        });             
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('badges');
    }
};
