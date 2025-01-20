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
            $table->increments('volunteer_id');
            $table->string('name', 100);
            $table->text('description');
            $table->integer('created_by')->nullable();
            $table->integer('crystal_reward');
            $table->integer('leaflets_reward');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
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
