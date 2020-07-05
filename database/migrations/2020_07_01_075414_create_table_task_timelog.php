<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTaskTimelog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         DB::statement("
       CREATE TABLE `mas_task_time_log`(  
          `id` INT(25) NOT NULL AUTO_INCREMENT,
          `task_id` INT(25),
          `user_id` BIGINT(20) UNSIGNED NOT NULL,
          `start_time` DATETIME,
          `end_time` DATETIME,
          `total_time` BIGINT(25),
          `created_at` DATETIME,
          `created_by` BIGINT(20) NOT NULL,
          `updated_at` DATETIME,
          `updated_by` BIGINT(20) NOT NULL,
          PRIMARY KEY (`id`),
          FOREIGN KEY (`task_id`) REFERENCES `master_tasks`(`task_id`),
          FOREIGN KEY (`user_id`) REFERENCES `users`(`id`)
        );
           
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_task_timelog');
    }
}
