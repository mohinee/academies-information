<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcademyTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academy_tag', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('academy_id');
            $table->foreign('academy_id')->references('id')->on('academies')->onDelete('cascade');
            $table->integer('tag_id');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('casacde');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('academy_tags');
    }
}
