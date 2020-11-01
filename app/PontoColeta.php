<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PontoColeta extends Model
{
    //
    protected $fillable = [
        'nome',
        'endereco',
        'latitude',
        'longitude'
    ];
}
