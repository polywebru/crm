<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCodeAndFieldToSpecialitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('specialities', function (Blueprint $table) {
            $table->string('code', 10)->after('id');
            $table->string('profile')->nullable()->after('name');

            $table->dropForeign(['faculty_id']);
            $table->dropUnique(['faculty_id', 'name']);
        });

        Schema::table('specialities', function (Blueprint $table) {
            $table->unique(['faculty_id', 'code', 'name', 'profile']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('specialities', function (Blueprint $table) {
            $table->dropColumn('code');
            $table->dropColumn('profile');
        });
    }
}
