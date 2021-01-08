<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Adddescriptionstatusmastertasks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
        ALTER TABLE `master_tasks`   
        ADD COLUMN `task_status` INT(11) NULL AFTER `project_id`,
        ADD COLUMN `task_description` TEXT NULL AFTER `task_status`,
        ADD FOREIGN KEY (`task_status`) REFERENCES `mas_dropdowns`(`id`);

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
