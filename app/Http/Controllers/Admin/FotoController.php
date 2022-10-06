<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Album;
use App\Models\Foto;


class FotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['permission:fotos.index|fotos.create|fotos.edit|fotos.delete']);
    }
    

    public function index()
    {
        $fotos = Foto::latest()->when(request()->q, function($fotos) {
            $fotos = $fotos->where('keterangan', 'like', '%'. request()->q . '%');
        })->paginate(10);
        
        return view('admin.foto.index', compact('fotos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $kategori = Album::All();
        return view('admin.foto.create', compact('kategori'));
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
            'album_id'  => 'required',
            'keterangan'   => 'required',
            'foto'         => 'required|image|mimes:jpeg,jpg,png|max:2048'

        ]);

        // dd($request);

        //upload image
        $image = $request->file('foto');
        $image->storeAs('public/galerifoto', $image->hashName());

        $foto = foto::create([
            'foto'      => $image->hashName(),
            'album_id' => $request->input('album_id'),  
            'keterangan' => $request->input('keterangan'),  
            'slug'        => Str::slug($request->input('keterangan'), '-')
        ]);

        if($foto){
            //redirect dengan pesan sukses
            return redirect()->route('admin.foto.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin.foto.index')->with(['error' => 'Data Gagal Disimpan!']);
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
        $data = Foto::findOrFail($id);
        $kategori = Album::latest()->get();
        return view('admin.foto.edit', compact('data','kategori'));
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
        $get = foto::findOrFail($id);
        // dd($get);

        $this->validate($request,[
            'keterangan'         => 'required',
            'album_id'     => 'required',
            'foto'          => 'image|mimes:jpeg,jpg,png|max:2048'

        ]);

        if ($request->file('foto') == "") {
        
            $data = foto::findOrFail($id);
            $data->update([
            'album_id'       => $request->input('album_id'),
            'keterangan'     => $request->input('keterangan'),  
            'slug'           => Str::slug($request->input('keterangan'), '-')
            ]);

        } else {

            //remove old image
            Storage::disk('local')->delete('public/galerifoto/'.$get->foto);

            //upload new image
            $image = $request->file('foto');
            $image->storeAs('public/galerifoto', $image->hashName());

            $data = foto::findOrFail($id);
            $data->update([
            'album_id'       => $request->input('album_id'),
            'keterangan' => $request->input('keterangan'),
            'foto'      => $image->hashName(),  
            'slug'        => Str::slug($request->input('keterangan'), '-')
            ]);

        }

        if($data){
            //redirect dengan pesan sukses
            return redirect()->route('admin.foto.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin.foto.index')->with(['error' => 'Data Gagal Disimpan!']);
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
        $data = foto::findOrFail($id);
        $image = Storage::disk('local')->delete('public/galerifoto/'.basename($data->foto));
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
