<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DataStatis;

/**
 * beritaController
 */
class DataStatisController extends Controller
{
        
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $datas = DataStatis::latest()->paginate(6);
        return response()->json([
            "response" => [
                "status"    => 200,
                "message"   => "List Data Statis"
            ],
            "data" => $datas
        ], 200);
    }
   
    /**
     * show
     * 
     * @param  mixed $slug
     * @return void
     */
    // public function show($slug)
    // {
    //     $datas = DataStatis::where('slug', $slug)->first();

<<<<<<< HEAD
        if($datastatis){
            return response()->json([
                "response" => [
                    "status"    => 200,
                    "message"   => "Detail Data berita"
                ],
                "data" => $datastatis
            ], 200);
=======
    //     if($datas
    //         return response()->json([
    //             "response" => [
    //                 "status"    => 200,
    //                 "message"   => "Detail Data berita"
    //             ],
    //             "data" => $datas
    //         ], 200);
>>>>>>> 9ac7ba9a401fb51633829df1482814b72365dd6e

    //     } else {

    //         return response()->json([
    //             "response" => [
    //                 "status"    => 404,
    //                 "message"   => "Data berita Tidak Ditemukan!"
    //             ],
    //             "data" => null
    //         ], 404);

    //     }
    // }

    
    /**
     * beritaHomePage
     *
     * @return void
     */
    public function DataStatisHomePage()
    {
        $datas = DataStatis::latest()->take(6)->get();
        return response()->json([
            "response" => [
                "status"    => 200,
                "message"   => "List Data beritas Homepage"
            ],
            "data" => $datas
        ], 200);
    }
}