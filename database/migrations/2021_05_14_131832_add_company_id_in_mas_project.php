<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCompanyIdInMasProject extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("ALTER TABLE `mas_projects`   
                       ADD COLUMN `company_id` INT(25) NULL AFTER `client_id`,
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
        Schema::table('mas_project', function (Blueprint $table) {
            //
        });
    }
}
