<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePracticasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('practicas', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('calificacion')->nullable();
            $table->string('observacion')->nullable();
            $table->string('informe')->nullable();
            $table->string('comentario')->nullable();
            $table->unsignedBigInteger('idpreinscripcion');
            $table->string('estado');
            $table->foreign('idpreinscripcion')->references('id')->on('preinscripciones');
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
        Schema::dropIfExists('practicas');
    }
}
