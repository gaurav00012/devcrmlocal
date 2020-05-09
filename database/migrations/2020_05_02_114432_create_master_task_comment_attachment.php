<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasterTaskCommentAttachment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
        CREATE TABLE `devcrm`.`mas_task_comment_attachment`(  
            `id` INT(25) NOT NULL AUTO_INCREMENT,
            `task_comment_id` INT(2),
            `attachment_name` VARCHAR(255),
            `created_at` DATETIME,
            `created_by` BIGINT(20),
            `updated_at` DATETIME,
            `updated_by` BIGINT(20),
            PRIMARY KEY (`id`),
            FOREIGN KEY (`task_comment_id`) REFERENCES `devcrm`.`mas_task_comment`(`id`)
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
        Schema::dropIfExists('master_task_comment_attachment');
    }
}
