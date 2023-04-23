<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsignaturasTable extends Migration
{
    public function up()
    {
        Schema::create('asignaturas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->integer('creditos');
            $table->string('docente');
            $table->string('prerrequisito')->nullable();
            $table->integer('horas_trabajo_autonomo');
            $table->integer('horas_trabajo_dirigido');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('asignaturas');
    }
}
