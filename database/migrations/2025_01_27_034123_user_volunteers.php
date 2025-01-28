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
        Schema::create('user_volunteers', function (Blueprint $table) {
            $table->increments('user_volunteer_id');
            $table->unsignedBigInteger('user_id'); // Tipe data sesuai dengan id pada tabel users
            $table->unsignedInteger('volunteer_id'); // Tipe data disesuaikan dengan tabel volunteers
            $table->enum('status', ['pending', 'confirmed'])->default('pending');
            $table->timestamp('confirmed_at')->nullable();

            // Foreign key constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('volunteer_id')->references('volunteer_id')->on('volunteers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_volunteers');
    }
};
