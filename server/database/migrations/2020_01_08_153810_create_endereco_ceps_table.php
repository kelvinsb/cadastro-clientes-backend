<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnderecoCepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('endereco_ceps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cep', 12)->nullable();
            $table->string('logradouro', 40)->nullable();
            $table->string('bairro', 40)->nullable();
            $table->string('cidade', 40)->nullable();
            $table->string('estado', 40)->nullable();
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
        Schema::dropIfExists('endereco_ceps');
    }
}
