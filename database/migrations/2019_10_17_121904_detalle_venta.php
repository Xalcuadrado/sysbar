<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DetalleVenta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_venta', function (Blueprint $table) {
            $table->increments('iddetalle_venta');
            $table->integer('cantidad');
            $table->integer('precio_venta');
            $table->integer('descuento');
            $table->integer('idproducto')->unsigned()->index();
            $table->foreign('idproducto')->references('idproducto')->on('producto')->onDelete('cascade');
            $table->integer('idventa')->unsigned()->index();
            $table->foreign('idventa')->references('idventa')->on('venta')->onDelete('cascade');
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
        Schema::dropIfExists('detalle_venta');
    }
}
