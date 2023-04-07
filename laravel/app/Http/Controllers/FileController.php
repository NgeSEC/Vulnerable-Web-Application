<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function show($fileName)
    {
        if (!Storage::exists('uploads/' . $fileName)) {
            abort(404);
        }
        $file = Storage::get('uploads/' . $fileName);
        $type = Storage::mimeType('uploads/' . $fileName);
        $response = response($file, 200)->header('Content-Type', $type);
        return $response;
    }
}
