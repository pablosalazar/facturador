<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaProductos extends Migration
{
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {

            $table->increments('id');

            $table->integer('categoria_id')->unsigned()->nullable();
            $table->string('nombre');

            $table->timestamps();

            $table->foreign('categoria_id')
                ->references('id')->on('categorias')
                ->onDelete('set null');

        });
    }

    public function down()
    {
        Schema::dropIfExists('productos');
    }
}