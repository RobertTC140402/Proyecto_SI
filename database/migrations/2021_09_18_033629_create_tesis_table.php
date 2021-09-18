<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTesisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tesis', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('titulo');
            $table->string('documentos');
            $table->string('alumno');
            $table->string('telefono');
            $table->date('finicio');
            $table->string('asesor');
            $table->string('jurado')->nullable();
            $table->date('fsustentacion')->nullable();
            $table->string('link_sustentacion')->nullable();
            $table->string('estado');
            $table->string('sumilla')->nullable();
            $table->string('observacion')->nullable();
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
        Schema::dropIfExists('tesis');
    }
}
