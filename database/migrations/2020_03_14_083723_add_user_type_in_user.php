<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserTypeInUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         DB::statement("
               ALTER TABLE `users`   
               ADD COLUMN `user_role` INT(2) NULL AFTER `email`,
                ADD FOREIGN KEY (`user_role`) REFERENCES `{d}crm`.`user_role`(`user_role_id`);
                    ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user', function (Blueprint $table) {
            //
        });
    }
}
