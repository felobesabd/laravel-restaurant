<?php

namespace App\Helpers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ImgHelper
{
    public static function uploadImage($folder, $image) {
		Storage::disk($folder)->put('/',  $image);
		return  'uploads/' . $image->hashName();
    }
}
