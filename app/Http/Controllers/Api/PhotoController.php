<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Foto;

class PhotoController extends Controller
{
        
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $photos = Foto::latest()->paginate(6);
        return response()->json([
            "response" => [
                "status"    => 200,
                "message"   => "List Data Foto"
            ],
            "data" => $photos
        ], 200);
    }
    
    /**
     * PhotoHomePage
     *
     * @return void
     */
    public function PhotoHomePage()
    {
        $photos = Foto::latest()->take(6)->get();
        return response()->json([
            "response" => [
                "status"    => 200,
                "message"   => "List Data Foto Homepage"
            ],
            "data" => $photos
        ], 200);
    }
}