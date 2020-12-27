<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class RepositoryEscalacao extends Repository
{

    public function escalacoesDeJogadores()
    {
        return  DB::table('escalacao_partida')
            ->join('jogadores', 'escalacao_partida.id_jogador', '=', 'jogadores.id')
            ->join('times', 'times.id', '=', 'jogadores.id_time')
            ->select(
                DB::raw('count(jogadores.id) as partidas_jogadas'),
                'jogadores.nome as nome_jogador',
                'jogadores.posisao',
                'times.nome as nome_time'
            )
            ->groupBy('nome_jogador')
            ->groupBy('nome_time')
            ->groupBy('jogadores.posisao')
            ->orderBy('partidas_jogadas', "desc")
            ->orderBy('nome_time')
            ->get();
    }
}
