<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatInvoiceItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
              CREATE TABLE `invoice_item_detail`(  
              `id` BIGINT(20) NOT NULL AUTO_INCREMENT,
              `item_name` VARCHAR(255),
              `quantity` INT(50),
              `price` BIGINT(100),
              `amount` BIGINT(100),
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
        //
    }
}
