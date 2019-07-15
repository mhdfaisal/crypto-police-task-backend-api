<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Webpatser\Uuid\Uuid;

class FileController extends Controller
{
    public function uploadimage(Request $request){
        $filename= Uuid::generate()->string."image.jpg";
        $path = $request->file('photo')->move(public_path("/images/"), $filename);
        $photoURL = url('/images/'.$filename);
        return response()->json(['url' => $photoURL], 200);
    }
}
