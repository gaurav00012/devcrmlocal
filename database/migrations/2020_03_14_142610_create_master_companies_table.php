<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasterCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
              CREATE TABLE `mas_companies`(  
              `id` INT(25) NOT NULL AUTO_INCREMENT,
              `company_name` VARCHAR(255),
              `created_by` VARCHAR(255),
              `created` DATETIME,
              `updated_by` VARCHAR(255),
              `updated` DATETIME,
              PRIMARY KEY (`id`)
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
        Schema::dropIfExists('master_companies');
    }
}
