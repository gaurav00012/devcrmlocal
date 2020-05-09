<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasterTaskComment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
        CREATE TABLE `devcrm`.`mas_task_comment`(  
        `id` INT(2) NOT NULL AUTO_INCREMENT,
        `task_id` INT(25),
        `task_comments` TEXT,
        `created_by` BIGINT(20),
        `created_at` DATETIME,
        `updated_by` BIGINT(20),
        `updated_at` DATETIME,
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
        Schema::dropIfExists('master_task_comment');
    }
}
