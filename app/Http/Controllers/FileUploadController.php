<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    static function upload($file){
        $filepath = $file->move("upload", $file->getClientOriginalName());
        return $filepath;
    }

    static function uploadSingleFile($file){
        return self::upload($file);
    }
}
