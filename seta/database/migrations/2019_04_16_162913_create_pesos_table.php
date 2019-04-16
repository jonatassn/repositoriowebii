<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePesosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_disciplina');
            $table->double('trabalho',3,2);
            $table->double('avaliacao',3,2);
            $table->double('parcial01',3,2);
            $table->double('parcial02',3,2);
            $table->double('parcial03',3,2);
            $table->double('parcial04',3,2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesos');
    }
}
