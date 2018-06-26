<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlternativaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alternativa', function (Blueprint $table) {
            $table->increments('id');
            $table->string('alternativa');
            $table->integer('pregunta_id')->unsigned();
            $table->timestamps();

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
        Schema::dropIfExists('alternativa');
    }
}
