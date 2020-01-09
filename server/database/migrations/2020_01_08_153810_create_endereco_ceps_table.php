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
            $table->string('cep', 12);
            $table->string('logradouro', 40);
            $table->string('bairro', 40);
            $table->string('cidade', 40);
            $table->string('estado', 40);
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
