<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compra', function (Blueprint $table) {
            $table->increments('idcompra');
            $table->string('t_comprobante');
            $table->integer('n_comprobante');
            $table->decimal('impuesto', 8, 2);
            $table->string('estado');
            $table->integer('idempresa')->unsigned()->index();
            $table->foreign('idempresa')->references('idempresa')->on('empresa')->onDelete('cascade');
            $table->integer('idproveedor')->unsigned()->index();
            $table->foreign('idproveedor')->references('idproveedor')->on('proveedor')->onDelete('cascade');
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
        Schema::dropIfExists('compra');
    }
}
