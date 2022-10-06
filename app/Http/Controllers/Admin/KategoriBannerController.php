<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\KategoriBanner;
use Illuminate\Support\Str;

class KategoriBannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['permission:katbanners.index|katbanners.create|katbanners.edit|katbanners.delete']);
    }
    public function index()
    {
        $data = KategoriBanner::latest()->when(request()->q, function($data) {
            $data = $data->where('title', 'like', '%'. request()->q . '%');
        })->paginate(10);
        // $data = Kategori_Berita::All();
        return view('admin.kategoribanner.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kategoribanner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->input('kategori'), '-');

        $data = KategoriBanner::create($data);

        return redirect()->route('admin.kategoribanner.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = KategoriBanner::findOrFail($id);
        return view('admin.kategoribanner.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kategori' => 'required',
        ]);

        $data = KategoriBanner::findOrFail($id);
        $kat = $request->all();
        $kat['slug'] = Str::slug($request->input('kategori'), '-');
        $data->update($kat);

        return redirect()->route('admin.kategoribanner.index')->with('success','Data berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = KategoriBanner::findOrFail($id);
        $del = $data->delete();

        if ($del) {
            return response()->json([
                'status' => 'success'
            ]);
        } else {
            return response()->json([
                'status' => 'error'
            ]);
        }
    }

    
}
