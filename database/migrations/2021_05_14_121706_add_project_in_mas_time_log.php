<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProjectInMasTimeLog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("ALTER TABLE `devcrm`.`mas_task_time_log`   
                            ADD COLUMN `project_id` INT(25) NULL AFTER `company_id`,
                        ADD FOREIGN KEY (`project_id`) REFERENCES `mas_projects`(`id`);
                        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mas_time_log', function (Blueprint $table) {
            //
        });
    }
}
