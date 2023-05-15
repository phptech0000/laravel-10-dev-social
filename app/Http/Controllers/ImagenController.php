<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImagenController extends Controller
{
    //
    public function store(Request $request)
    {
        $imagen=$request->file('file');
        $imageName = Str::uuid().".".$imagen->extension();
        $serverImage = Image::make($imagen);
        $serverImage->fit(1000,1000);
        $imagePath = public_path('uploads')."/".$imageName;
        $serverImage->save($imagePath);
        return response()->json(['image'=>$imageName]);
    }
}
