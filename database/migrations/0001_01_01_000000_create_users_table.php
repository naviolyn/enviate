<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    if (!Schema::hasTable('users')) {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(); // Default Laravel Breeze
            $table->string('username', 50)->unique()->notNullable();
            $table->string('email', 100)->unique()->notNullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 255)->notNullable();
            $table->rememberToken();
            $table->integer('level')->default(1);
            $table->integer('leaflets')->default(0);
            $table->integer('crystal')->default(0);
            $table->enum('role', ['user', 'mitra', 'admin'])->notNullable()->default('user');
            $table->string('location', 100)->nullable();
            $table->timestamps(0);
        });        
        
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
