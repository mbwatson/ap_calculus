<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStandardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('standards', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->string('name');
            $table->text('description');
            $table->text('details')->nullable();
            $table->integer('parent_id')->unsigned()->nullable();
            $table->timestamps();
        });

        Schema::create('question_standard', function(Blueprint $table)
        {
            $table->integer('question_id')->unsigned()->index();
            $table->integer('standard_id')->unsigned()->index();

            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
            $table->foreign('standard_id')->references('id')->on('standards')->onDelete('cascade');

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
        Schema::drop('question_standard');
        Schema::drop('standards');
    }
}
