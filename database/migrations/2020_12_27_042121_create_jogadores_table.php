<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJogadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jogadores', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('nome', 100);
            $table->smallInteger('numero');
            $table->integer('id_time')->index('id_time');
            $table->enum('posisao', ['GOLEIRO', 'LATERAL_ESQUERDO', 'LATERAL_DIREITO', 'ZAGUEIRO', 'VOLANTE', 'MEIA', 'ATACANTE']);
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
        Schema::dropIfExists('jogadores');
    }
}
