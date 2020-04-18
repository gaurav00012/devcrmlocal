<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttachment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
        CREATE TABLE `devcrm`.`mas_task_attachments`(  
            `id` INT(25) NOT NULL AUTO_INCREMENT,
            `task_id` INT(25),
            `file_name` VARCHAR(255),
            `created_at` DATETIME,
            `created_by` BIGINT(25),
            `updated_at` DATETIME,
            `updated_by` BIGINT(25),
            PRIMARY KEY (`id`),
            FOREIGN KEY (`task_id`) REFERENCES `devcrm`.`master_tasks`(`task_id`)
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
        Schema::dropIfExists('attachment');
    }
}
