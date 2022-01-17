<?php

namespace App\Http\Controllers;

use App\Providers\UploadImagesService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class fileUploadsController extends Controller
{
    public function gettingFile(Request $request)
    {
        return response()->json(['imagens' => UploadImagesService::uploads_images_from_product($request->file('fotos'))]);
    }
}
