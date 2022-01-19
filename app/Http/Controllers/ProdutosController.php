<?php

namespace App\Http\Controllers;

use App\Models\Produtos;
use App\Models\UploadImagesProduct;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    public function index()
    {
        return Produtos::paginate(100);
    }
    public function store(Request $request)
    {
        try {
            $produto = new Produtos();
            $produto->nome = $request->nome;
            $produto->valor = $request->valor;
            $produto->descricao = $request->descricao;
            $produto->id_categoria = $request->id_categoria;
            $produto->id_user_criador = $request->user_id;
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
            $produto->id_categoria = $request->id_categoria;//Trocar para a categoria posteriormente
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
            UploadImagesProduct::where('id_produto', $produto->id)->delete();

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
