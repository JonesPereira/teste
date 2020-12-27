<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class RepositoryPartida extends Repository
{

    public function partidasEscalacoes()
    {
        return  DB::table('partidas')
            ->join('escalacao_partida', 'escalacao_partida.id_partida', '=', 'partidas.id')
            ->join('jogadores', 'escalacao_partida.id_jogador', '=', 'jogadores.id')
            ->join('times', 'times.id', '=', 'jogadores.id_time')
            ->select('partidas.data_partida', 'times.nome AS nome_time', 'jogadores.nome AS nome_jogador', 'jogadores.posisao')
            ->orderBy("partidas.data_partida")
            ->orderBy("times.id")
            ->get();
    }
}
