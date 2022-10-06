<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Kategori_Berita;

/**
 * beritaController
 */
class BeritaController extends Controller
{
        
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $beritas = Berita::join('kategori_berita', 'berita.kategori_id', '=','kategori_berita.id')->select('berita.*', 'kategori_berita.kategori')
                            ->orderby('tgl','DESC')->paginate(3);
        return response()->json([
            "response" => [
                "status"    => 200,
                "message"   => "List Data beritas"
            ],
            "data" => $beritas
        ], 200);
    }
   
    /**
     * show
     *
     * @param  mixed $slug
     * @return void
     */
    public function show($slug)
    {
        $berita = berita::where('slug', $slug)->first();

        if($berita) {

            return response()->json([
                "response" => [
                    "status"    => 200,
                    "message"   => "Detail Data berita"
                ],
                "data" => $berita
            ], 200);

        } else {

            return response()->json([
                "response" => [
                    "status"    => 404,
                    "message"   => "Data berita Tidak Ditemukan!"
                ],
                "data" => null
            ], 404);

        }
    }

    
    /**
     * beritaHomePage
     *
     * @return void
     */
    public function beritaHomePage()
    {
        $beritas = berita::latest()->take(3)->orderby('tgl', 'desc')->get();
        return response()->json([
            "response" => [
                "status"    => 200,
                "message"   => "List Data beritas Homepage"
            ],
            "data" => $beritas
        ], 200);
    }
}