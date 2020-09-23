<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysInTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
             ALTER TABLE `master_tasks`   
              ADD FOREIGN KEY (`company_id`) REFERENCES `{d}crm`.`mas_companies`(`id`),
              ADD FOREIGN KEY (`project_id`) REFERENCES `{d}crm`.`mas_projects`(`id`);
             ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('task', function (Blueprint $table) {
            //
        });
    }
}
