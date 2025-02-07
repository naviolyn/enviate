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
        Schema::create('styles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('avatar_id')->constrained('avatars')->onDelete('cascade'); // Avatar yang memiliki style
            $table->string('name'); // Nama style
            $table->string('path'); // Path gambar style
            $table->integer('leaflet_cost'); // Harga style dalam leaflet
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
