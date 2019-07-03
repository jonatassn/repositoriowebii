<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEspecimensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Schema::enableForeignKeyConstraints();
        Schema::create('especimens', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nickname');
            $table->date('age');
            $table->tinyInteger('gender');
            $table->string('biometric_info');
            $table->integer('id_researcher');
            $table->integer('id_tag');
            //$table->foreign('id_researcher')->references('id_researcher')->on('researchers');
            //$table->foreign('id_tag')->references('id_tag')->on('tags');
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
        Schema::dropIfExists('especimens');
    }
}
