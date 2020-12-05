<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUsersTableAddColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('class_number')->nullable();
            $table->string('class_letter')->nullable();
            $table->foreignId('school_id')->nullable()->constrained('schools');
            $table->foreignId('subject_id')->nullable()->constrained('subjects');
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
            $table->dropForeign(['school_id']);
            $table->dropForeign(['subject_id']);
            $table->dropColumn(['class_number', 'class_letter', 'class_teacher', 'school_id', 'subject_id']);
        });
    }
}
