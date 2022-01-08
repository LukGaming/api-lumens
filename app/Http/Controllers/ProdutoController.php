<?php

namespace App\Http\Controllers;

use App\Models\Produtos;


use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index()
    {
        return Produtos::paginate(10);
    }
    public function store(Request $request)
    {
        return Produtos::create([
            'nome' => $request->nome,
            'valor' => $request->valor,
            'descricao' => $request->descricao,
            'id_user_criador' => 0//Arrumar para o ID do usuário depois!
        ]);
    }
    public function edit($id)
    {
        return response()->json(Produtos::findOrFail($id));
    }
    public function update(Request $request)
    {
        return Produtos::where('id', $request->id)->update(
            [
                'nome' => $request->nome,
                'valor' => $request->valor,
                'descricao' => $request->descricao,
            ]
        );
       
    }
    public function destroy($id){
        return Produtos::where('id', $id)->delete();
    }
}
