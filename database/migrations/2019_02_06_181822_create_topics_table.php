<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->string('slug')->index();
            $table->unsignedInteger('subject_id');
            $table->unsignedInteger('questions_count')->default(0);
            $table->string('description')->nullable();
            $table->string('color', 7)->default('#000000');
            $table->timestamps();

            $table->foreign('subject_id')->references('id')
                ->on('subjects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('topics');
    }
}
