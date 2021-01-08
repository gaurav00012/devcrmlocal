<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMasNotification extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
         DB::statement("
                        CREATE TABLE `mas_notification`(  
                          `id` INT(25) NOT NULL AUTO_INCREMENT,
                          `from` BIGINT(20) UNSIGNED NOT NULL,
                          `to` BIGINT(20) UNSIGNED NOT NULL,
                          `subject` BIGINT(20) UNSIGNED NOT NULL,
                          `message` TEXT,
                          `status` INT(1),
                          `created_at` DATETIME,
                          `created_by` BIGINT(20) UNSIGNED NOT NULL,
                          `updated_at` DATETIME,
                          `updated_by` BIGINT(20) UNSIGNED NOT NULL,
                          PRIMARY KEY (`id`),
                          FOREIGN KEY (`from`) REFERENCES `users`(`id`),
                          FOREIGN KEY (`to`) REFERENCES `users`(`id`),
                          FOREIGN KEY (`created_by`) REFERENCES `users`(`id`),
                          FOREIGN KEY (`updated_by`) REFERENCES `users`(`id`)
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
        Schema::dropIfExists('table_mas_notification');
    }
}
