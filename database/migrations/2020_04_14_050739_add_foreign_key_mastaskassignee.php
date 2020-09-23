<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyMastaskassignee extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
           DB::statement("
       ALTER TABLE `mas_task_assignee`   
  CHANGE `id` `id` INT(11) NOT NULL AUTO_INCREMENT, 
  ADD PRIMARY KEY (`id`),
  ADD FOREIGN KEY (`task_id`) REFERENCES `{d}crm`.`master_tasks`(`task_id`);

        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
