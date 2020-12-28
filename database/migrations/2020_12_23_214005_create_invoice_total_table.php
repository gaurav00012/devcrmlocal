<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceTotalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE TABLE `invoice_total`(  
              `id` BIGINT(20) NOT NULL AUTO_INCREMENT,
              `total` BIGINT(50),
              `invoice` BIGINT(20),
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
        Schema::dropIfExists('invoice_total');
    }
}
