<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCompanyIdInMasTimeLog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       DB::statement("ALTER TABLE `mas_task_time_log`   
                        ADD COLUMN `company_id` INT(25) NULL AFTER `total_time`,
                        ADD FOREIGN KEY (`company_id`) REFERENCES `mas_companies`(`id`);
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
