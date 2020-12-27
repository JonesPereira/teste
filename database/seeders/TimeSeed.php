<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Carbon\Traits\Timestamp;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TimeSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('times')->insert([
            'nome' => "Grêmio",
        ]);

        DB::table('times')->insert([
            'nome' => "Internacional",
        ]);

        DB::table('times')->insert([
            'nome' => "Juventude",
        ]);

        DB::table('times')->insert([
            'nome' => "Caxias",
        ]);

        DB::table('times')->insert([
            'nome' => "Taquariense",
        ]);

        DB::table('times')->insert([
            'nome' => "Canoas",
        ]);

        DB::table('times')->insert([
            'nome' => "Pelotas",
        ]);
        DB::table('times')->insert([
            'nome' => "Juazeiro",
        ]);
    }
}
