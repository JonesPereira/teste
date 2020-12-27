<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jogador extends Model
{
    use HasFactory;
    protected $table = 'jogadores';
    protected $fillable = ['nome', 'numero', 'posisao', 'id_time'];
    protected $hidden = ['created_at','updated_at'];


    public function time(){
        return $this->belongsTo(Time::class, 'id_time', 'id');
    }
}
