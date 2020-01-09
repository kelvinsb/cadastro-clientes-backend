<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 80);
            $table->date('data_nascimento');
            $table->unsignedInteger('sexo_id');
            $table->unsignedInteger('endereco_id')->nullable();
            $table->foreign('sexo_id')->references('id')->on('sexos');
            $table->foreign('endereco_id')->references('id')->on('enderecos');
            $table->timestamps();
            $table->timestamp('excluded_on', 0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
