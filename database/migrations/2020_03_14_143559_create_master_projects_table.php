<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasterProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         DB::statement("
             CREATE TABLE `mas_projects`(  
              `id` INT(25) NOT NULL AUTO_INCREMENT,
              `project_name` VARCHAR(255),
              `company_id` INT(25),
              `created_by` VARCHAR(255),
              `created` DATETIME,
              `updated_by` VARCHAR(255),
              `updated` DATETIME,
              PRIMARY KEY (`id`),
              FOREIGN KEY (`company_id`) REFERENCES `{d}crm`.`mas_companies`(`id`)
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
        Schema::dropIfExists('master_projects');
    }
}
