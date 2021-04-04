<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class AddNewLinkTypesToLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("ALTER TABLE links MODIFY type ENUM('vk', 'tg', 'ok', 'fb', 'ig', 'gh', 'other') NOT NULL");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("ALTER TABLE links MODIFY type ENUM('vk', 'tg', 'ok', 'fb', 'other') NOT NULL");
    }
}
