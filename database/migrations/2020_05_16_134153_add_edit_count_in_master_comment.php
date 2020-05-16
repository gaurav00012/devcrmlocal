<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEditCountInMasterComment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            ALTER TABLE `mas_task_comment`   
            ADD COLUMN `edit_count` INT(25) DEFAULT 0  NULL AFTER `task_comments`;      
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('master_comment', function (Blueprint $table) {
            //
        });
    }
}
