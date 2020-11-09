<?php

use App\PontoColeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//Rotas HTTP para api (get, post, patch, delete) Pontos de Coleta
Route::apiResource('Pontos-Coleta', 'PontoColetaController');

//Rotas HTTP para api (get, post, patch, delete) Cidades
Route::apiResource('Cidades', 'CidadeController');

//Rota para busca de coleta por nome
Route::get('Pontos-Coleta/busca/{nome?}', 'PontoColetaController@search');


//Retorna todos os pontos de coleta da cidade $id
Route::get('cidade/{id}/PontosColeta', function ($id) {
     return App\Cidade::find($id)->pontosColeta;
});

//Busca cidade do determinado ponto de coleta
Route::get('Pontos-Coleta/{id}/cidade', function ($id) {
    $pontoColeta = PontoColeta::find($id);
    return $pontoColeta->cidade;
});
