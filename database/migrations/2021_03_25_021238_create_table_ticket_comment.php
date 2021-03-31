<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTicketComment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
                CREATE TABLE `mas_ticket_comment`(  
                  `id` BIGINT(20) NOT NULL AUTO_INCREMENT,
                  `ticket_id` BIGINT(20),
                  `comment` TEXT,
                  `commented_by` VARCHAR(50),
                  `created_by` BIGINT(20),
                  `created_at` DATETIME,
                  `updated_by` BIGINT(20),
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
        Schema::dropIfExists('table_ticket_comment');
    }
}
