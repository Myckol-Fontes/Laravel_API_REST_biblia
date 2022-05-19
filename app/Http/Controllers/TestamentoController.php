<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testamento;

class TestamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Testamento::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Testamento::create($request->all())){
            return response()->json([
                'message' => 'Testamento cadastrado com sucesso'
            ], 201);
        }

        return response()->json([
            'message' => 'Erro ao cadastrar Testamento'
        ], 404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $testamento
     * @return \Illuminate\Http\Response
     */
    public function show($testamento)
    {
        $testamento = Testamento::find($testamento);

        if($testamento){
             $testamento->livros;

            return $testamento;
        }

        return response()->json([
            'message' => 'Erro ao pesquisar Testamento'
        ], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $testamento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $testamento)
    {
        $testamento = Testamento::find($testamento);

        if($testamento){
            $testamento->update($request->all());

            return $testamento;
        }

        return response()->json([
            'message' => 'Erro ao atualizar Testamento'
        ], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $testamento
     * @return \Illuminate\Http\Response
     */
    public function destroy($testamento)
    {
        if(Testamento::destroy($testamento)){
            return response()->json([
                'message' => 'Testamento deletado com sucesso'
            ], 201);
        }

        return response()->json([
            'message' => 'Erro ao deletar Testamento'
        ], 404);
    }
}
