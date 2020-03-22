<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
                CREATE TABLE `{d}crm`.`user_role`(  
                `user_role_id` INT(2) NOT NULL,
                `user_type_name` VARCHAR(25),
                PRIMARY KEY (`user_role_id`)
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
        Schema::dropIfExists('user_role');
    }
}
