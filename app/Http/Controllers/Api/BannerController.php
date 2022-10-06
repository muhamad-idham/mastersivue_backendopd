<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Banner;

class BannerController extends Controller
{
        
    /**
     * index
     *
     * @return void
     */
    public function bannerlink()
    {
        $banners = Banner::where('kategori_id',1)->orderby('tgl_publish','DESC')->paginate(5);
        return response()->json([
            "response" => [
                "status"    => 200,
                "message"   => "List Data Banner Link"
            ],
            "data" => $banners
        ], 200);
    }
    public function banneriklan()
    {
        $banners = Banner::where('kategori_id',2)->orderby('tgl_publish','DESC')->paginate(5);
        return response()->json([
            "response" => [
                "status"    => 200,
                "message"   => "List Data Banner Iklan"
            ],
            "data" => $banners
        ], 200);
    }
}