<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Slider;


class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['permission:sliders.index|sliders.create|sliders.edit|sliders.delete']);
    }

    public function index()
    {
        $sliders = slider::latest()->when(request()->q, function($sliders) {
            $sliders = $sliders->where('judul', 'like', '%'. request()->q . '%');
        })->paginate(10);
        
        return view('admin.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
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
            'judul'         => 'required|unique:sliders',
            'tgl_publish'   => 'required',
            'status'        => 'required',
            'gambar'        => 'required|image|mimes:jpeg,jpg,png|max:2000',

        ]);
        
        // dd($request);
        
        //upload image
        $image = $request->file('gambar');
        $image->storeAs('public/slide', $image->hashName());
        
        $slider = slider::create([
            'judul'       => $request->input('judul'),
            'status'      => $request->input('status'),  
            'gambar'      => $image->hashName(),
            'tgl_publish' => $request->input('tgl_publish'),  
            'slug'        => Str::slug($request->input('judul'), '-'),
        ]);
        
        if($slider){
            //redirect dengan pesan sukses
            return redirect()->route('admin.slider.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin.slider.index')->with(['error' => 'Data Gagal Disimpan!']);
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
        $data = slider::findOrFail($id);
        return view('admin.slider.edit', compact('data'));
    }

    // public function edit(slider $slider)
    // {
    //     $tags = Tags::latest()->get();
    //     $kategori = Kategori_slider::latest()->get();
    //     return view('admin.slider.edit', compact('slider', 'tags', 'kategori'));
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
        $get = slider::findOrFail($id);
        // dd($get);
       
        $this->validate($request,[
            'judul'         => 'required',
            'tgl_publish'   => 'required',
            'status'        => 'required',
            'gambar'        => 'image|mimes:jpeg,jpg,png|max:2000',

        ]);

        if ($request->file('gambar') == "") {
        
            $data = slider::findOrFail($id);
            $data->update([
                'judul'       => $request->input('judul'),
                'status'      => $request->input('status'),  
                'tgl_publish' => $request->input('tgl_publish'),  
                'slug'        => Str::slug($request->input('judul'), '-'),  
            ]);

        } else {

            //remove old image
            Storage::disk('local')->delete('public/slide/'.basename($get->gambar));

            //upload new image
            $image = $request->file('gambar');
            $image->storeAs('public/slide', $image->hashName());

            $data = slider::findOrFail($id);
            $data->update([
                'judul'       => $request->input('judul'),
                'status'      => $request->input('status'),  
                'gambar'      => $image->hashName(),
                'tgl_publish' => $request->input('tgl_publish'),  
                'slug'        => Str::slug($request->input('judul'), '-'),
            ]);

        }

        if($data){
            //redirect dengan pesan sukses
            return redirect()->route('admin.slider.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin.slider.index')->with(['error' => 'Data Gagal Disimpan!']);
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
        $data = slider::findOrFail($id);
        // dd($data);
        $image = Storage::disk('local')->delete('public/slide/'.basename($data->gambar));
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
