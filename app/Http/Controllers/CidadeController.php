<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cidade;

class CidadeController extends Controller
{
    /**
     * Retorno todas as cidades
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Cidade::all();
    }

    /**
     * Cadastra uma nova cidade
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|unique:cidades',
            'uf' => 'required|size:2',
            'pais' => 'required'
        ]);
        return Cidade::create($request->all());
    }

    /**
     * Exibe uma derterminada cidade
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Cidade::find($id);
    }

    /**
     * Atualiza uma determinada cidade
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|unique:cidades',
            'uf' => 'required|size:2',
            'pais' => 'required'
        ]);

        $cidade = Cidade::find($id);
        $cidade::update($request->all());

        return $cidade;
    }

    /**
     * Deleta uma determinada cidade
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Cidade::destroy($id);
    }
}
