<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        /**
         * Limpar a tabelas e reiniciar auto incremento
        */
        DB::table('escalacao_partida')->delete();
        DB::table('partidas')->delete();
        DB::table('jogadores')->delete();
        DB::table('times')->delete();

        DB::statement("ALTER TABLE times AUTO_INCREMENT = 0;");
        DB::statement("ALTER TABLE jogadores AUTO_INCREMENT = 0;");
        DB::statement("ALTER TABLE partidas AUTO_INCREMENT = 0;");

        $this->call([
            TimeSeed::class,
            JogadorSeed::class,
            PartidaSeed::class,
            EscalacaoPartidaSeed::class
        ]);
    }
}
