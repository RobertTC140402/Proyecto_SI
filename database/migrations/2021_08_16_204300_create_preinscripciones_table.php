<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreinscripcionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preinscripciones', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('alumno');
            $table->string('docente');
            $table->string('organizacion');
            $table->string('rubro');
            $table->string('supervisor');
            $table->string('cargo');
            $table->string('telefono');
            $table->string('email');
            $table->date('finicio');
            $table->date('ftermino');
            $table->string('horas');
            $table->string('descripcion');
            $table->string('observacion')->nullable();
            $table->date('fenvio');
            $table->string('estado');
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
        Schema::dropIfExists('preinscripciones');
    }
}
