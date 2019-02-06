<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionTopicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_topic', function (Blueprint $table) {
            $table->unsignedInteger('question_id');
            $table->unsignedInteger('topic_id');

            $table->foreign('question_id')->references('id')
                ->on('questions')->onDelete('cascade');
            $table->foreign('topic_id')->references('id')
                ->on('topics')->onDelete('cascade');

            $table->primary(['question_id', 'topic_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('question_topic');
    }
}
