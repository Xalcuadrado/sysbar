<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProveedorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedor', function (Blueprint $table) {
            $table->increments('idproveedor');
            $table->string('nombre');
            $table->string('email')->unique();
            $table->string('direccion')->nullable();
            $table->string('telefono');
            $table->string('t_documento');
            $table->integer('n_documento');
            $table->integer('idempresa')->unsigned()->index();
            $table->foreign('idempresa')->references('idempresa')->on('empresa')->onDelete('cascade');
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
        Schema::dropIfExists('proveedor');
    }
}
