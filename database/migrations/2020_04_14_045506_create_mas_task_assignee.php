<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasTaskAssignee extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          DB::statement("
        CREATE TABLE `{d}crm`.`mas_task_assignee`(  
  `id` INT(11),
  `task_id` INT(25),
  `assignee` BIGINT(25),
  `created_at` DATETIME,
  `created_by` BIGINT(20),
  `updated_at` DATETIME,
  `updated_by` BIGINT(20)
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
        Schema::dropIfExists('mas_task_assignee');
    }
}
