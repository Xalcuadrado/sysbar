<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venta', function (Blueprint $table) {
            $table->increments('idventa');
            $table->integer('impuesto');
            $table->integer('total_venta');
            $table->integer('estado');
            $table->integer('idempresa')->unsigned()->index();
            $table->foreign('idempresa')->references('idempresa')->on('empresa')->onDelete('cascade');
            $table->integer('idusers')->unsigned()->index();
            $table->foreign('idusers')->references('id')->on('users')->onDelete('cascade');
            $table->integer('idmesa')->unsigned()->index();
            $table->foreign('idmesa')->references('idmesa')->on('mesa')->onDelete('cascade');
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
        Schema::dropIfExists('venta');
    }
}
