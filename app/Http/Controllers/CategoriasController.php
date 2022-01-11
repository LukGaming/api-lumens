<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    public function index()
    {
        return  Categorias::paginate(10);
    }
    public function store(Request $request)
    {
        try {
            $categoria = new Categorias();
            $categoria->nome_categoria = $request->nome_categoria;
            $categoria->user_id = $request->user_id;
            if ($categoria->save()) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Categoria Criada com sucesso!'
                ]);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
    public function edit($id)
    {
        return Categorias::findOrFail($id);
    }
    public function update(Request $request, $id)
    {
        $categoria = Categorias::findOrFail($id);
        if ($categoria) {
            try {
                $categoria->nome_categoria = $request->nome_categoria;
                if ($categoria->save()) {
                    return response()->json([
                        'status' => 'success',
                        'message' => 'Categoria Editada com sucesso!'
                    ]);
                }
            } catch (\Exception $e) {
                return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
            }
        }
    }
    public function destroy($id)
    {
        $categoria = Categorias::findOrFail($id);
        if ($categoria) {
            try {
                if ($categoria->delete()) {
                    return response()->json([
                        'status' => 'success',
                        'message' => 'Categoria Excluida com sucesso!'
                    ]);
                }
            } catch (\Exception $e) {
                return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
            }
        }
    }
}
