<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageUploadController extends Controller
{

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $uploadedFile = $request->file('file');
        $path = $uploadedFile->store('images', 'public');

        return response()->json(['location' => asset("storage/{$path}")]);
    }

}