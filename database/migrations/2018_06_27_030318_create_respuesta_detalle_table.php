<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRespuestaDetalleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respuesta_detalle', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pregunta_id')->unsigned();
            $table->integer('alternativa_id')->unsigned();
            $table->integer('respuesta_id')->unsigned();
            $table->timestamps();

            $table->foreign('pregunta_id')->references('id')->on('pregunta');
            $table->foreign('alternativa_id')->references('id')->on('alternativa');
            $table->foreign('respuesta_id')->references('id')->on('respuesta');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('respuesta_detalle');
    }
}
