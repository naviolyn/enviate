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
        Schema::create('volunteers', function (Blueprint $table) {
            $table->id('volunteer_id'); // Primary Key
            $table->string('name', 100);
            $table->text('description');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->integer('crystal_reward');
            $table->integer('leaflets_reward');
            $table->enum('category', [
                'Pelestarian Alam',
                'Edukasi & Kampanye Lingkungan',
                'Pembersihan & Pengelolaan Sampah',
                'Advokasi Kebijakan Lingkungan',
                'Pemantauan dan Penelitian Lingkungan'
            ]);
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->string('image')->nullable();
            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('volunteers');
    }
};