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
            $table->integer('user_id');
            $table->integer('volunteer_id');
            $table->enum('status', ['pending', 'confirmed'])->default('pending');
            $table->timestamp('confirmed_at')->nullable();
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
