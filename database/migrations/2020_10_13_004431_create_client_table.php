<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE TABLE `mas_client`(  
              `id` INT(25) NOT NULL AUTO_INCREMENT,
              `client_description` TEXT,
              `company_id` INT(25),
              `user_id` BIGINT(20) NOT NULL,
              `created_by` VARCHAR(255),
              `created_at` DATETIME,
              `updated_by` VARCHAR(255),
              `updated_at` DATETIME,
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
        Schema::dropIfExists('client');
    }
}
