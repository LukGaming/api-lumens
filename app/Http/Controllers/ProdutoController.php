<?php

namespace App\Http\Controllers;

use App\Models\Produtos;


use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function getAllProducts()
    {
        return Produtos::paginate(10);
    }
    public function insertProducts(Request $request)
    {
        return Produtos::create([
            'nome' => $request->nome,
            'valor' => $request->valor,
            'descricao' => $request->descricao,
            'id_user_criador' => 0//Arrumar para o ID do usuário depois!
        ]);
    }
    public function getProductById($id)
    {
        return response()->json(Produtos::findOrFail($id));
    }
    public function editProductById(Request $request)
    {
        return Produtos::where('id', $request->id)->update(
            [
                'nome' => $request->nome,
                'valor' => $request->valor,
                'descricao' => $request->descricao,
            ]
        );
       
    }
    public function deleteProductById($id){
        return Produtos::where('id', $id)->delete();
    }
}
