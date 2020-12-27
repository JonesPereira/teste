<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEscalacaoPartidaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('escalacao_partida', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_jogador')->index('fk_partida_jogador');
            $table->integer('id_partida')->index('fk_partida');
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
        Schema::dropIfExists('escalacao_partida');
    }
}
