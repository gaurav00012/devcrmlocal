<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ClientForm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE TABLE `client_form`(  
              `id` BIGINT(20) NOT NULL AUTO_INCREMENT,
              `company_name` VARCHAR(100),
              `contact_person` VARCHAR(255),
              `email` VARCHAR(100),
              `mailing_address` TEXT,
              `about_business` TEXT,
              `domain_name` TEXT,
              `hosting_access` TEXT,
              `hosting_email` VARCHAR(100),
              `content` VARCHAR(100),
              `copy` TEXT,
              `primary_goal` TEXT,
              `target_geographic` VARCHAR(255),
              `target_audience` VARCHAR(255),
              `describe_word_1` VARCHAR(25),
              `describe_word_2` VARCHAR(25),
              `describe_word_3` VARCHAR(25),
              `company_colors` VARCHAR(255),
              `navigation` TEXT,
              `competitors` VARCHAR(255),
              `reference` TEXT,
              `company_logo` VARCHAR(255),
              `additional_notes` TEXT,
              `ip` VARCHAR(255),
              `created_at` DATETIME,
              `created_by` BIGINT(20) NOT NULL,
              `update_at` DATETIME,
              `updated_by` BIGINT(20) NOT NULL,
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
