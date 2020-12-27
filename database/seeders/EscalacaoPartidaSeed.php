<?php

namespace Database\Seeders;

use App\Models\Partida;
use App\Models\Time;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EscalacaoPartidaSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        # Busca todas as partidas
        $listaDepartidas =  Partida::all();

        # Percorremos cada partida para adicionar os jogadores "escalados" automaticamente
        foreach ($listaDepartidas as $key => $partida) {

            # "Escalamos" os times
            $timeMandante  = Time::findOrFail($partida->id_time_mandante);
            $timeVisitante  = Time::findOrFail($partida->id_time_visitante);

            # Cada escalacao_partida tem seu código da partida e o id doi jogador que for escalado
            for ($i = 0; $i < 11; $i++) {
                DB::table('escalacao_partida')->insert([
                    'id_jogador' => $timeMandante->jogadores->get($i)->id,
                    'id_partida' => $partida->id
                ]);
            }

            for ($i = 0; $i < 11; $i++) {
                DB::table('escalacao_partida')->insert([
                    'id_jogador' => $timeVisitante->jogadores->get($i)->id,
                    'id_partida' => $partida->id
                ]);
            }
        }
    }
}
