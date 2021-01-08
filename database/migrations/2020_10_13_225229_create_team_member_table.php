<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE TABLE `mas_team`(  
              `id` INT(25) NOT NULL AUTO_INCREMENT,
              `user_id` BIGINT(20),
              `company_id` INT(25),
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
        Schema::dropIfExists('team_member');
    }
}
