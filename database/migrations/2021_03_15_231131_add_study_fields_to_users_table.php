<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStudyFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('speciality_id')->nullable()->after('date_birth')->constrained();
            $table->date('study_begin_date')->nullable()->after('speciality_id');
            $table->enum('study_duration', ['bakalavriat', 'specialitet', 'magistratura'])
                ->nullable()
                ->after('study_begin_date');
            $table->text('wishes')->nullable()->after('study_duration');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropConstrainedForeignId('speciality_id');
            $table->dropColumn('study_begin_date');
            $table->dropColumn('study_duration');
            $table->dropColumn('wishes');
        });
    }
}
