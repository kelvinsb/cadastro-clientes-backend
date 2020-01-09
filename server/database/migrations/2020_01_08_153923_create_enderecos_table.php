<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnderecosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enderecos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('numero', 10)->nullable();
            $table->string('complemento', 40)->nullable();
            $table->unsignedInteger('endereco_banco_id')->nullable();
            $table->foreign('endereco_banco_id')->references('id')->on('endereco_ceps');
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
        Schema::dropIfExists('enderecos');
    }
}
