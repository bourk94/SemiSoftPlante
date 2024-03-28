<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function upload(Request $request)
    {
        $request->file('image')->store('images');
        return 'Image uploaded successfully';
    }
}
