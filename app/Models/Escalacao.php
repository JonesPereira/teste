<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escalacao extends Model
{
    use HasFactory;
    protected $table = 'escalacao_partida';
    protected $fillable = ['id_jogador', 'id_partida'];
    protected $hidden = ['created_at','updated_at'];
}
