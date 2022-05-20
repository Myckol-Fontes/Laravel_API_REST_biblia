<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Versao;


class VersaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Versao::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Versao::create($request->all())){
            return response()->json([
                'message' => 'Versao cadastrado com sucesso'
            ], 201);
        }

        return response()->json([
            'message' => 'Erro ao cadastrar Versao'
        ], 404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $versao
     * @return \Illuminate\Http\Response
     */
    public function show($versao)
    {
        //
        $versao = Versao::find($versao);

        if($versao){

            return $versao;
        }

        return response()->json([
            'message' => 'Erro ao pesquisar Versao'
        ], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $versao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $versao)
    {
        $versao = Versao::find($versao);

        if($versao){
            $versao->update($request->all());

            return $versao;
        }

        return response()->json([
            'message' => 'Erro ao atualizar Versao'
        ], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $versao
     * @return \Illuminate\Http\Response
     */
    public function destroy($versao)
    {
        if(Versao::destroy($versao)){
            return response()->json([
                'message' => 'Versao deletado com sucesso'
            ], 201);
        }

        return response()->json([
            'message' => 'Erro ao deletar Versao'
        ], 404);
    }
}
