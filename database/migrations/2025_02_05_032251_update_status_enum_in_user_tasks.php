<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('user_tasks', function (Blueprint $table) {
            // Mengubah kolom 'status' untuk menambahkan 'in_progress'
            $table->enum('status', ['pending', 'completed', 'in_progress'])->default('pending')->change();
        });
    }

    public function down()
    {
        Schema::table('user_tasks', function (Blueprint $table) {
            // Kembalikan ke status awal ('pending' dan 'completed')
            $table->enum('status', ['pending', 'completed'])->default('pending')->change();
        });
    }
};
