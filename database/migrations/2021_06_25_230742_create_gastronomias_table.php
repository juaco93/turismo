<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGastronomiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gastronomias', function (Blueprint $table) {
            $table->id();
            $table->string("nombre");
            $table->string("direccion");
            $table->bigInteger('localidad_id')->unsigned()->index()->nullable();
            $table->foreign('localidad_id')->references('id')->on('localidades');
            $table->string("telefono");
            $table->string("web");
            $table->string("email");
            $table->string("tipo");
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
        Schema::dropIfExists('gastronomias');
    }
}
