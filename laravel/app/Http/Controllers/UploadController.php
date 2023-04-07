<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function index()
    {
        return view('upload');
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
        ]);

        $fileName = $request->file->getClientOriginalName();

        //$request->file->move(public_path('uploads'), $fileName);
        Storage::putFileAs('uploads', $request->file, $fileName);

        return back()
            ->with('success','File has been uploaded.')
            ->with('file', $fileName);
    }
}
