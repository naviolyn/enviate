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
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('task_id');
            $table->string('name', 100);
            $table->text('description');
            $table->enum('type', ['daily', 'weekly', 'monthly']);
            $table->integer('leaflets_reward');
            $table->unsignedBigInteger('created_by')->nullable(); // Foreign Key ke users.id
            $table->enum('status', ['0', '1'])->notNullable()->default('1'); 
            $table->tinyInteger('reminder')->default(0);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));

            // Menambahkan foreign key ke tabel users
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
