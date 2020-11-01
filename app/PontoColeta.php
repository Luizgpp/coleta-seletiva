<?php

namespace App;
use App\Cidade;
use Illuminate\Database\Eloquent\Model;

class PontoColeta extends Model
{

    //restringe os campos que podem ser adicionados/alterados
    protected $fillable = [
        'nome',
        'endereco',
        'latitude',
        'longitude',
        'cidade_id'
    ];

    // Indicando que o um ponto de coleta pertence a uma cidade
    public function Cidade()
    {
        return $this->belongsTo(Cidade::class);
    }

}
