<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resultado', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('encuesta_id')->unsigned();
            $table->integer('alternativa_id')->unsigned();
            $table->integer('pregunta_id')->unsigned();
            $table->timestamps();

            $table->foreign('encuesta_id')->references('id')->on('encuesta');
            $table->foreign('alternativa_id')->references('id')->on('alternativa');
            $table->foreign('pregunta_id')->references('id')->on('pregunta');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resultado');
    }
}
