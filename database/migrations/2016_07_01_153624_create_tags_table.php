<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->string('name');
            $table->text('description');
            $table->integer('parent_id')->unsigned()->nullable();
            $table->timestamps();
        });

        Schema::create('question_tag', function(Blueprint $table)
        {
            $table->integer('question_id')->unsigned()->index();
            $table->integer('tag_id')->unsigned()->index();

            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('question_tag');
        Schema::drop('tags');
    }
}
