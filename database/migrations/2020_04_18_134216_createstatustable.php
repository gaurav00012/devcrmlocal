<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Createstatustable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
        CREATE TABLE `mas_dropdowns`(  
            `id` INT(11) NOT NULL AUTO_INCREMENT,
            `type` VARCHAR(50),
            `name` VARCHAR(255),
            `created_at` DATETIME,
            `created_by` BIGINT(25),
            `updated_at` DATETIME,
            `updated_by` BIGINT(25),
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
        //
    }
}
