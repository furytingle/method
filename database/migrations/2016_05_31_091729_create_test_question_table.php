<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_question', function (Blueprint $table) {
            $table->integer('test_id')->unsigned();
            $table->integer('question_id')->unsigned();
        });

        Schema::table('test_question', function ($table) {
            $table->foreign('test_id')->references('id')->on('tests')->onDelete('cascade');
            $table->foreign('question_id')->references('id')->on('questions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('test_question', function ($table) {
            $table->dropForeign(['test_id']);
            $table->dropForeign(['question_id']);
        });

        Schema::drop("test_question");
    }
}
