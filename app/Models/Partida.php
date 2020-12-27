<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partida extends Model
{
    use HasFactory;
    protected $table = 'partidas';
    protected $fillable = ['data_partida', 'id_time_mandante', 'id_time_visitante'];
    protected $casts = ['data_partida'  => 'date:d/m/Y'];
    protected $hidden = ['created_at', 'updated_at'];
}
