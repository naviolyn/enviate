<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE VIEW `user_view` AS
            SELECT 
                `users`.`id` AS `user_id`, 
                `users`.`username` AS `username`, 
                `users`.`email` AS `email`, 
                `users`.`level` AS `level`, 
                `users`.`leaflets` AS `leaflets`, 
                `users`.`crystal` AS `crystal`, 
                `users`.`role` AS `role`,  
                `users`.`created_at` AS `created_at` 
            FROM `users`
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS `user_view`");
    }
};
