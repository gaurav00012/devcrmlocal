<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterMasterTasks extends Migration
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
             ALTER TABLE `master_tasks`   
              CHANGE `user_id` `user_id` BIGINT(20) NULL,
              ADD COLUMN `project_id` INT(25) NULL AFTER `company_id`;


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
