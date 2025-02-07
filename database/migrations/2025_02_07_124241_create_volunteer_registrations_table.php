<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('volunteer_registrations', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->unsignedBigInteger('volunteer_id'); // Foreign Key ke volunteers.volunteer_id
            $table->foreign('volunteer_id')->references('volunteer_id')->on('volunteers')->onDelete('cascade');
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade'); // Relasi ke tabel users
            $table->string('name'); // Nama pendaftar
            $table->string('email'); // Email pendaftar
            $table->string('phone'); // No HP
            $table->text('reason')->nullable(); // Alasan daftar
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('volunteer_registrations');
    }
};
