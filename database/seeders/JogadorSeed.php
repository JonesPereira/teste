<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class JogadorSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $enum = ['GOLEIRO', 'LATERAL_ESQUERDO', 'LATERAL_DIREITO', 'ZAGUEIRO', 'VOLANTE', 'MEIA', 'ATACANTE'];
        for ($i = 0; $i < 200; $i++) {
            DB::table('jogadores')->insert([
                'nome' => Str::random(10),
                'numero' => rand(0, 99),
                'posisao' => $enum[rand(0, 6)],
                'id_time' => rand(1, 8),
                'created_at'=> Carbon::now(),
            ]);
        }
    }
}
