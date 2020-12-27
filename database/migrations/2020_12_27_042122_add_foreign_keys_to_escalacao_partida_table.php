<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToEscalacaoPartidaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('escalacao_partida', function (Blueprint $table) {
            $table->foreign('id_partida', 'fk_partida')->references('id')->on('partidas')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('id_jogador', 'fk_partida_jogador')->references('id')->on('jogadores')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('escalacao_partida', function (Blueprint $table) {
            $table->dropForeign('fk_partida');
            $table->dropForeign('fk_partida_jogador');
        });
    }
}
