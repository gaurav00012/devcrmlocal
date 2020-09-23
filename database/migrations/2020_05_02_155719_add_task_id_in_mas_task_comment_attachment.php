<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTaskIdInMasTaskCommentAttachment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
        ALTER TABLE `mas_task_comment_attachment`   
        ADD COLUMN `task_id` INT(25) NULL AFTER `id`,
        ADD FOREIGN KEY (`task_id`) REFERENCES `master_tasks`(`task_id`);
     ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mas_task_comment_attachment', function (Blueprint $table) {
            //
        });
    }
}
