<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGatronomiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gatronomia', function (Blueprint $table) {
            $table->increments('id');
            $table->string("nombre");
            $table->string("direccion");
            $table->string("ciudad");
            $table->string("departamento");
            $table->string("provincia");
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
        Schema::dropIfExists('gatronomia');
    }
}
