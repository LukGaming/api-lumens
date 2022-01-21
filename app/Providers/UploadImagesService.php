<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class UploadImagesService extends ServiceProvider
{
   public static function uploads_images_from_product($image)
   {
      $picName = $image->getClientOriginalName();
      $path = 'uploads' . DIRECTORY_SEPARATOR . 'produtos' . DIRECTORY_SEPARATOR;
      $picName = uniqid() . '_' . $picName;
      $destinationPath = public_path($path);
      File::makeDirectory($destinationPath, 0777, true, true);
      $image->move(public_path("/uploads"), $picName);
      return 'uploads/' . $picName;
   }
   public static function removeImage($caminho_imagem){
      File::delete($caminho_imagem);
   }
}
