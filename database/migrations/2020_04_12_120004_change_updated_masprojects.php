<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeUpdatedMasprojects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         DB::statement("
        ALTER TABLE `mas_projects` CHANGE `created` `created_at` DATETIME NULL DEFAULT NULL;
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
