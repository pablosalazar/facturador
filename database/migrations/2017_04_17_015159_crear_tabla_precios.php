<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaPrecios extends Migration
{
    public function up()
    {
        Schema::create('precios', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('categoria_id')->unsigned()->nullable();
            $table->integer('producto_id')->unsigned()->nullable();
            $table->string('venta')->nullable()->default("");
            $table->string('costo')->nullable()->default("");
            $table->string('referencia')->nullable()->default("");


            $table->timestamps();

            $table->foreign('categoria_id')
                ->references('id')->on('categorias')
                ->onDelete('cascade');

            $table->foreign('producto_id')
                ->references('id')->on('productos')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('precios');
    }
}
