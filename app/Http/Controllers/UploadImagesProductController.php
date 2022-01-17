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
            'id_produto' => 2
        ]);
        return response()->json([
            'caminho_imagem' => $caminho_imagem,
            'id_produto' => $request->id_produto
        ]);
    }
}
