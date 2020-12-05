<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('quiz_id')->constrained('quizzes');
            $table->foreignId('order_id')->constrained('orders');
            $table->double('result');
            $table->integer('all_score');
            $table->string('name')->nullable();
            $table->string('surname')->nullable();
            $table->string('father_name')->nullable();
            $table->string('city')->nullable();
            $table->string('region')->nullable();
            $table->string('area')->nullable();
            $table->string('school')->nullable();
            $table->string('class_letter')->nullable();
            $table->integer('class_number')->nullable();
            $table->integer('certificate_type')->nullable();
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
        Schema::dropIfExists('quiz_results');
    }
}
