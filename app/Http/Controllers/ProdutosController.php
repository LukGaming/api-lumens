<?php

namespace App\Http\Controllers;

use App\Models\Produtos;


use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    public function index()
    {
        return Produtos::paginate(10);
    }
    public function store(Request $request)
    {
        try {
            $produto = new Produtos();
            $produto->nome = $request->nome;
            $produto->valor = $request->valor;
            $produto->descricao = $request->descricao;
            $produto->id_user_criador = 0;

            if ($produto->save()) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Produto Criado com sucesso!',
                    'produto' => $produto
                ]);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
    public function edit($id)
    {
        return response()->json(Produtos::findOrFail($id));
    }
    public function update(Request $request, $id)
    {
        try {
            $produto =  Produtos::findOrFail($id);
            $produto->nome = $request->nome;
            $produto->valor = $request->valor;
            $produto->descricao = $request->descricao;
            $produto->categoria = 0;//Trocar para a categoria posteriormente
            $produto->id_user_criador = 0;//Trocar para o id do usuário posteriormente
            if ($produto->save()) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Produto Editado com sucesso!',
                    'produto' => $produto
                ]);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
    public function destroy($id)
    {
        try {
            $produto = Produtos::findOrFail($id);
            if ($produto->delete()) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Produto Removido com sucesso!'
                ]);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
