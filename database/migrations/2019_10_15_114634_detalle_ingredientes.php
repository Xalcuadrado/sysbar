<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DetalleIngredientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_ingrediente', function (Blueprint $table) {
            $table->increments('iddetalle_ingrediente');
            $table->string('cantidad');
            $table->integer('idproducto')->unsigned()->index();
            $table->foreign('idproducto')->references('idproducto')->on('producto')->onDelete('cascade');
            $table->integer('idingrediente')->unsigned()->index();
            $table->foreign('idingrediente')->references('idingrediente')->on('ingrediente')->onDelete('cascade');
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
        Schema::dropIfExists('detalle_ingrediente');
    }
}
