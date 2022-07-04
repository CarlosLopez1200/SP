<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeticionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peticiones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Solicitante');
            $table->string('Direccion');
            $table->string('Numero de telefono');
            $table->date('Fecha de solicitud');
            $table->string('Estatus');
            $table->string('Encargado');
            $table->bigInteger('servicio_id')->unsigned();

            $table->foreign('servicio_id')->references('id')->on('servicios')->onDelete("cascade");
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
        Schema::dropIfExists('peticiones');
    }
}
