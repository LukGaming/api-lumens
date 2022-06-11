<?php

namespace App\Http\Controllers;

use App\Models\Produtos;
use App\Models\UploadImagesProduct;
use App\Providers\UploadImagesService;
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
            $produto->id_user_criador = $request->user_id;
            if ($produto->save()) {
                foreach ($request->file('images') as $image) {
                    $image_path = UploadImagesService::uploads_images_from_product($image);
                    $image_db = new UploadImagesProduct();
                    $image_db->caminho_imagem_produto = $image_path;
                    $image_db->id_produto = $produto->id;
                    $image_db->save();
                }
                return response()->json([
                    'status' => 'success',
                    'message' => 'Produto Criado com sucesso!',
                    'produto' => $produto,
                ]);
            }
        } catch (\Exception$e) {
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
            $produto = Produtos::findOrFail($id);
            $produto->nome = $request->produto['nome'];
            $produto->valor = $request->produto['valor'];
            $produto->descricao = $request->produto['descricao'];
            $produto->id_categoria = $request->id_categoria; //Trocar para a categoria posteriormente
            if ($produto->save()) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Produto Editado com sucesso!',
                    'produto' => $produto,
                ]);
            }
        } catch (\Exception$e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
    public function destroy($id)
    {
        try {

            $produto = Produtos::findOrFail($id);
            $caminho_imagens = UploadImagesProduct::where('id_produto', $produto->id)->get();
            UploadImagesProduct::where('id_produto', $produto->id)->delete();
            for ($i = 0; $i < count($caminho_imagens); $i++) {
                UploadImagesService::removeImage($caminho_imagens[$i]->caminho_imagem_produto);
            }

            if ($produto->delete()) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Produto Removido com sucesso!',
                ]);
            }
        } catch (\Exception$e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
