<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PartidaSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 20; $i++) {
            DB::table('partidas')->insert([
                'data_partida' => Carbon::today()->subDays(rand(0, 365)),
                'id_time_mandante' => rand(1, 4),
                'id_time_visitante' => rand(5, 8)
            ]);
        }
    }
}
