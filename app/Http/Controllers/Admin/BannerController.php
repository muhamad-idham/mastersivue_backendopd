<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Banner;
use App\Models\KategoriBanner;


class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['permission:banners.index|banners.create|banners.edit|banners.delete']);
    }
    

    public function index()
    {
        $banners = banner::latest()->when(request()->q, function($banners) {
            $banners = $banners->where('judul', 'like', '%'. request()->q . '%');
        })->paginate(10);
        
        return view('admin.banner.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $kategori = KategoriBanner::All();
        return view('admin.banner.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'judul'         => 'required|unique:banner',
            'kategori_id'   => 'required',
            'status'        => 'required',
            'tgl_publish'   => 'required',
            'link'          => 'required',
            'gambar'        => 'required|image|mimes:jpeg,jpg,png|max:2048'

        ]);

        // dd($request);

        //upload image
        $image = $request->file('gambar');
        $image->storeAs('public/banner', $image->hashName());

        $banner = Banner::create([
            'judul'       => $request->input('judul'),
            'kategori_id' => $request->input('kategori_id'),
            'gambar'      => $image->hashName(),
            'tgl_publish' => $request->input('tgl_publish'),  
            'status'      => $request->input('status'),  
            'link'        => $request->input('link'),  
            'slug'        => Str::slug($request->input('judul'), '-')
        ]);

        if($banner){
            //redirect dengan pesan sukses
            return redirect()->route('admin.banner.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin.banner.index')->with(['error' => 'Data Gagal Disimpan!']);
        }

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
        $data = Banner::findOrFail($id);
        $kategori = KategoriBanner::latest()->get();
        return view('admin.banner.edit', compact('data', 'kategori'));
    }

    // public function edit(banner $banner)
    // {
    //     $tags = Tags::latest()->get();
    //     $kategori = KategoriBanner::latest()->get();
    //     return view('admin.banner.edit', compact('banner', 'tags', 'kategori'));
    // }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $get = Banner::findOrFail($id);
        // dd($get);

        // $this->validate($request,[
        //     'judul'         => 'required',
        //     'kategori_id'   => 'required',
        //     'status'        => 'required',
        //     'tgl_publish'   => 'required',
        //     'link'          => 'required',
        //     'gambar'        => 'required|image|mimes:jpeg,jpg,png|max:2048'

        // ]);
        

        if ($request->file('gambar') == "") {
        
            $data = Banner::findOrFail($id);
            $data->update([
            'judul'       => $request->input('judul'),
            'kategori_id' => $request->input('kategori_id'),
            'tgl_publish' => $request->input('tgl_publish'),  
            'status'      => $request->input('status'),  
            'link'        => $request->input('link'),  
            'slug'        => Str::slug($request->input('judul'), '-')
            ]);

        } else {

            //remove old image
            Storage::disk('local')->delete('public/banner/'.$get->gambar);

            //upload new image
            $image = $request->file('gambar');
            $image->storeAs('public/banner', $image->hashName());

            $data = banner::findOrFail($id);
            $data->update([
            'judul'       => $request->input('judul'),
            'kategori_id' => $request->input('kategori_id'),
            'tgl_publish' => $request->input('tgl_publish'),  
            'status'      => $request->input('status'),  
            'link'        => $request->input('link'),  
            'gambar'      => $image->hashName(),  
            'slug'        => Str::slug($request->input('judul'), '-')
            ]);

        }

        if($data){
            //redirect dengan pesan sukses
            return redirect()->route('admin.banner.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin.banner.index')->with(['error' => 'Data Gagal Disimpan!']);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Banner::findOrFail($id);
        $image = Storage::disk('local')->delete('public/banner/'.basename($data->gambar));
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
