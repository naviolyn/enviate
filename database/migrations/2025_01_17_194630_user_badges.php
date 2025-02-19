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
        Schema::create('user_badges', function (Blueprint $table) {
            $table->increments('user_badge_id');
            $table->unsignedBigInteger('user_id'); // Menggunakan unsignedBigInteger untuk sesuai dengan id tabel users
            $table->unsignedBigInteger('badge_id');
            $table->timestamp('earned_at')->default(DB::raw('CURRENT_TIMESTAMP'));

            // Foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('badge_id')->references('badge_id')->on('badges')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_badges');
    }
};
