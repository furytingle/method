<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('text');
            $table->tinyInteger('correct');
            $table->integer('type'); // need to think about
        });

        Schema::table('answers', function ($table) {
            $table->integer('question_id')->unsigned();

            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('answers', function ($table) {
            $table->dropForeign(['question_id']);
        });

        Schema::drop('answers');
    }
}
