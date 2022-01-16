<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class fileUploadsController extends Controller
{
    public function gettingFile(Request $request)
    {
        $picName = $request->file('file')->getClientOriginalName();
        $path = 'uploads' . DIRECTORY_SEPARATOR . 'files' . DIRECTORY_SEPARATOR . 'cnic' . DIRECTORY_SEPARATOR;
        $picName = uniqid() . '_' . $picName;
        $destinationPath = public_path($path);
        File::makeDirectory($destinationPath, 0777, true, true);
        $request->file('file')->move(public_path("/uploads"), $picName);
        return response()->json([
            'status' => 'success',
            'message' => 'Imagem enviada com sucesso!',
            'imagem' => 'uploads/'.$picName
        ]);
    }
}
