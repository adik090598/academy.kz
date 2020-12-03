<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('image_path');
            $table->text('description');
            $table->integer('duration');
            $table->float('price');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->integer('first_place')->nullable();
            $table->integer('second_place')->nullable();
            $table->integer('third_place')->nullable();
            $table->foreignId('subject_id')->nullable()->constrained('subjects');
            $table->foreignId('role_id')->nullable()->constrained('roles');
            $table->foreignId('category_id')->constrained('categories');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quizzes');
    }
}
