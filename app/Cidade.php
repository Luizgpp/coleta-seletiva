<?php

namespace App;
use App\PontoColeta;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    //restringe os campos que podem ser adicionados/alterados
    protected $fillable = [
        'nome',
        'uf',
        'pais'
    ];

    //Indica que podem ter varios pontos de coleta
    public function pontosColeta()
    {
        return $this->hasMany(PontoColeta::class);
    }
}
