<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DetalleCompra extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_compra', function (Blueprint $table) {
            $table->increments('iddetalle_compra');
            $table->integer('cantidad');
            $table->integer('precio_compra');
            $table->integer('idproducto')->unsigned()->index();
            $table->foreign('idproducto')->references('idproducto')->on('producto')->onDelete('cascade');
            $table->integer('idcompra')->unsigned()->index();
            $table->foreign('idcompra')->references('idcompra')->on('compra')->onDelete('cascade');
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
        Schema::dropIfExists('detalle_compra');
    }
}
