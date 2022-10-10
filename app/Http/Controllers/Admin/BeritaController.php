<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Berita;
use App\Models\Tag;
use App\Models\Kategori_Berita;


class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['permission:beritas.index|beritas.create|beritas.edit|beritas.delete']);
    }
    

    public function index()
    {
        $beritas = Berita::latest()->when(request()->q, function($beritas) {
            $beritas = $beritas->where('judul', 'like', '%'. request()->q . '%');
        })->paginate(10);
        
        return view('admin.berita.index', compact('beritas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $kategori = Kategori_Berita::All();
        // dd($kategori);  
        $tags = Tag::latest()->get();
        return view('admin.berita.create', compact('kategori','tags'));
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
            'judul'         => 'required|unique:berita',
            'kategori_id'   => 'required',
            'isi'           => 'required',
            'tgl'           => 'required',
            'foto'          => 'required|image|mimes:jpeg,jpg,png|max:2000',

        ]);

        // dd($request);

        //upload image
        $image = $request->file('foto');
        $image->storeAs('public/berita', $image->hashName());

        $berita = Berita::create([
            'judul'       => $request->input('judul'),
            'kategori_id' => $request->input('kategori_id'),
            'isi'         => $request->input('isi'),  
            'foto'        => $image->hashName(),
            'tgl'         => $request->input('tgl'),  
            'slug'        => Str::slug($request->input('judul'), '-'),
        ]);

        //assign tags
        $berita->tags()->attach($request->input('tags'));
        $berita->save();
        

        if($berita){
            //redirect dengan pesan sukses
            return redirect()->route('admin.berita.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin.berita.index')->with(['error' => 'Data Gagal Disimpan!']);
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
        $data = Berita::findOrFail($id);
        $tags = Tag::latest()->get();
        $kategori = Kategori_Berita::latest()->get();
        return view('admin.berita.edit', compact('data', 'kategori','tags'));
    }

    // public function edit(Berita $berita)
    // {
    //     $tags = Tags::latest()->get();
    //     $kategori = Kategori_Berita::latest()->get();
    //     return view('admin.berita.edit', compact('berita', 'tags', 'kategori'));
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
        $get = Berita::findOrFail($id);
        // dd($get);

        $this->validate($request,[
            'judul'         => 'required',
            'kategori_id'   => 'required',
            'isi'           => 'required',
            'tgl'           => 'required',
            'foto'          => 'image|mimes:jpeg,jpg,png|max:2048'

        ]);

        if ($request->file('foto') == "") {
        
            $data = Berita::findOrFail($id);
            $data->update([
                'judul'       => $request->input('judul'),
                'slug'        => Str::slug($request->input('judul'), '-'),
                'kategori_id' => $request->input('kategori_id'),
                'isi'         => $request->input('isi'),
                'tgl'         => $request->input('tgl')  
            ]);

        } else {

            //remove old image
            Storage::disk('local')->delete('storage/berita/'.$get->foto);

            //upload new image
            $image = $request->file('foto');
            $image->storeAs('public/berita', $image->hashName());

            $data = Berita::findOrFail($id);
            $data->update([
                'judul'       => $request->input('judul'),
                'slug'        => Str::slug($request->input('judul'), '-'),
                'kategori_id' => $request->input('kategori_id'),
                'foto'        => $image->hashName(), 
                'isi'         => $request->input('isi'),
                'tgl'         => $request->input('tgl')  
            ]);

        }

        if($data){
            //redirect dengan pesan sukses
            return redirect()->route('admin.berita.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin.berita.index')->with(['error' => 'Data Gagal Disimpan!']);
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
        $data = Berita::findOrFail($id);
        $image = Storage::disk('local')->delete('public/posts/'.basename($data->foto));
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
