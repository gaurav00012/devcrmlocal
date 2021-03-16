<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
                 CREATE TABLE `mas_ticket`(  
                  `id` BIGINT(20) NOT NULL AUTO_INCREMENT,
                  `user_id` BIGINT(20),
                  `client_id` BIGINT(20),
                  `company_id` BIGINT(20),
                  `subject` TEXT,
                  `description` TEXT,
                  `created_at` DATETIME,
                  `created_by` BIGINT(20),
                  `updated_at` DATETIME,
                  `updated_by` BIGINT(20),
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
        Schema::dropIfExists('ticket');
    }
}
