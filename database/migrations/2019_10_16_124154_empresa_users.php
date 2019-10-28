<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EmpresaUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresa_users', function (Blueprint $table) {
            $table->increments('idempresa_users');
            $table->integer('idusers')->unsigned()->index();
            $table->foreign('idusers')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('empresa_users');
    }
}
