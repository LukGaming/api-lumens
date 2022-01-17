<?php

namespace App\Http\Controllers;

use App\Models\UploadImagesProduct;
use App\Providers\UploadImagesService;
use Illuminate\Http\Request;

class UploadImagesProductController extends Controller
{
    public function upload_image_produto(Request $request)
    {
        $caminho_imagem =  UploadImagesService::uploads_images_from_product($request->file('fotos'));
        UploadImagesProduct::create([
            'caminho_imagem_produto' => $caminho_imagem,
            'id_produto' => $request->id_produto
        ]);
        return response()->json([
            'caminho_imagem' => $caminho_imagem,
            'id_produto' => $request->id_produto
        ]);
    }
    public function list_images_produto(Request $request, $id_produto){
        $imagens = UploadImagesProduct::where('id_produto', $id_produto)->get();
        return response()->json([
            'imagens_produto' => $imagens
        ]);
    }
}
