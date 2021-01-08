<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasterTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       DB::statement("
             CREATE TABLE `master_tasks`(  
              `task_id` INT(25) NOT NULL AUTO_INCREMENT,
              `task_name` VARCHAR(255),
              `user_id` INT(20),
              `company_id` INT(25),
              `is_attachment` TINYINT(25),
              `created` DATETIME,
              `created_by` VARCHAR(255),
              `updated` DATETIME,
              `updated_by` VARCHAR(255),
              PRIMARY KEY (`task_id`)
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
        Schema::dropIfExists('master_tasks');
    }
}
