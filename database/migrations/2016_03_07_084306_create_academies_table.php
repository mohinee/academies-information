<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcademiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academies', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('user_name')->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->text('images');
            $table->text('time_slots');
            $table->string('phone');
            $table->string('description');
            $table->double('latitude',10,7);
            $table->double('longitude',10,7);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('academies');
    }
}
