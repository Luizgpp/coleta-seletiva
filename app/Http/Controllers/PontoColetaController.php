<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\PontoColeta;

class PontoColetaController extends Controller
{
    /**
     * Retorna todas os pontos de coleta
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PontoColeta::all();

    }

    /**
     * Cadastra novo ponto de coleta
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|unique:ponto_coletas|max:155',
            'endereco' => 'required|min:15'
        ]);
        return PontoColeta::create($request->all());
    }

    /**
     * Exibe um determinado ponto de coleta
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return PontoColeta::find($id);
    }

    /**
     * Altera um terminado ponto de coleta
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|max:155',
            'endereco' => 'required|min:15'
        ]);

        $pontoColeta = PontoColeta::find($id);
        $pontoColeta->update($request->all());

        return $pontoColeta;

    }

    /**
     * Deleta um determinado ponto de coleta
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return PontoColeta::destroy($id);
    }

    /**
     * Busca coletas pelo nome
     *
     * @return \Illuminate\Http\Response
     */
    public function search($nome)
    {
        $resultado =  PontoColeta::where('nome','like', "%". $nome . "%")->get();

        return  $resultado;
    }
}
