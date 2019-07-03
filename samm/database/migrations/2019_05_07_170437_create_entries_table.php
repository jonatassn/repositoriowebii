<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Schema::enableForeignKeyConstraints();
        Schema::create('entries', function (Blueprint $table) {
            $table->dateTime('date_time_entry');
            $table->integer('id_module');
            $table->integer('id_tag');
            //$table->foreign('id_module')->references('id_researcher')->on('modules');
            //$table->foreign('id_tag')->references('id_tag')->on('tags');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entries');
    }
}
