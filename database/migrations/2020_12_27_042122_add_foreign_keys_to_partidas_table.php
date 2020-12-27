<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPartidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('partidas', function (Blueprint $table) {
            $table->foreign('id_time_mandante', 'fk_time_mandante')->references('id')->on('times')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('id_time_visitante', 'fk_time_visitante')->references('id')->on('times')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('partidas', function (Blueprint $table) {
            $table->dropForeign('fk_time_mandante');
            $table->dropForeign('fk_time_visitante');
        });
    }
}
