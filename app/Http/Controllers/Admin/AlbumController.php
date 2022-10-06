<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Album;


class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['permission:albums.index|albums.create|albums.edit|albums.delete']);
    }
    

    public function index()
    {
        $albums = Album::latest()->when(request()->q, function($albums) {
            $albums = $albums->where('judul', 'like', '%'. request()->q . '%');
        })->paginate(10);
        
        return view('admin.album.index', compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $kategori = Album::All();
        return view('admin.album.create');
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
            'judul'         => 'required|unique:album_foto',
            'tgl_album'     => 'required',
            'foto'          => 'required|image|mimes:jpeg,jpg,png|max:2000'

        ]);

        // dd($request);

        //upload image
        $image = $request->file('foto');
        $image->storeAs('public/album', $image->hashName());

        $album = album::create([
            'judul'       => $request->input('judul'),
            'foto'      => $image->hashName(),
            'tgl_album' => $request->input('tgl_album'),  
            'slug'        => Str::slug($request->input('judul'), '-')
        ]);

        if($album){
            //redirect dengan pesan sukses
            return redirect()->route('admin.album.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin.album.index')->with(['error' => 'Data Gagal Disimpan!']);
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
        $data = Album::findOrFail($id);
        return view('admin.album.edit', compact('data'));
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
        $get = Album::findOrFail($id);
        // dd($get);

        $this->validate($request,[
            'judul'         => 'required',
            'tgl_album'     => 'required',
            'foto'          => 'image|mimes:jpeg,jpg,png|max:2000'

        ]);

        if ($request->file('foto') == "") {
        
            $data = Album::findOrFail($id);
            $data->update([
            'judul'       => $request->input('judul'),
            'tgl_album' => $request->input('tgl_album'),  
            'slug'        => Str::slug($request->input('judul'), '-')
            ]);

        } else {

            //remove old image
            Storage::disk('local')->delete('public/album/'.$get->foto);

            //upload new image
            $image = $request->file('foto');
            $image->storeAs('public/album', $image->hashName());

            $data = Album::findOrFail($id);
            $data->update([
            'judul'       => $request->input('judul'),
            'tgl_album' => $request->input('tgl_album'),
            'foto'      => $image->hashName(),  
            'slug'        => Str::slug($request->input('judul'), '-')
            ]);

        }

        if($data){
            //redirect dengan pesan sukses
            return redirect()->route('admin.album.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin.album.index')->with(['error' => 'Data Gagal Disimpan!']);
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
        $data = album::findOrFail($id);
        $image = Storage::disk('local')->delete('public/album/'.basename($data->foto));
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
