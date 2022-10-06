<?php

namespace App\Http\Controllers\Admin;

use App\Models\Dokumen;
use App\Models\KategoriData;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DokumenController extends Controller
{
    /**
     * __construct
     *
     * @return void
     */
    public function __construct() 
    {
        $this->middleware(['permission:dokumens.index|dokumens.create|dokumens.edit|dokumens.delete']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dokumens = dokumen::latest()->when(request()->q, function($dokumens) {
            $dokumens = $dokumens->where('judul', 'like', '%'. request()->q . '%');
        })->paginate(10);

        return view('admin.dokumen.index', compact('dokumens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = KategoriData::All();
        return view('admin.dokumen.create',compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'judul'     => 'required',
            'isi'       => 'required',
            'kategori_id'       => 'required',
            'isi'       => 'required',
            'file'      => 'required|max:50000|mimes:pdf,doc,docx',
        ]);

        $file = $request->file('file');
        $file->storeAs('public/dokumen', $file->hashName());

        $dokumen = dokumen::create([
            'judul'         => $request->input('judul'),
            'kategori_id'   => $request->input('kategori_id'),
            'slug'          => Str::slug($request->input('judul'), '-'),
            'isi'           => $request->input('isi'),
            'file'          => $file->hashName()
        ]);
        if($dokumen){
            //redirect dengan pesan sukses
            return redirect()->route('admin.dokumen.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin.dokumen.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $dokumen = Dokumen::findOrFail($id);
        $kategori = KategoriData::latest()->get();
        return view('admin.dokumen.edit', compact('dokumen','kategori'));
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
        $this->validate($request, [
            'judul'     => 'required',
            'kategori_id'   => 'required', 
            'id'  => 'required'
        ]);

        if ($request->file('file') == "") {
        
            $dokumen = Dokumen::findOrFail($id);
            $dokumen->update([
                'judul'         => $request->input('judul'),
                'kategori_id'   => $request->input('kategori_id'),
                'slug'          => Str::slug($request->input('judul'), '-'),
                'isi'           => $request->input('isi')
            ]);

        } else {

            //remove old image
            Storage::disk('local')->delete('public/dokumen/'.$get->file);

            //upload new image
            $image = $request->file('file');
            $image->storeAs('public/dokumen', $image->hashName());

            $dokumen = banner::findOrFail($id);
            $dokumen->update([
                'judul'         => $request->input('judul'),
                'kategori_id'   => $request->input('kategori_id'),
                'slug'          => Str::slug($request->input('judul'), '-'),
                'isi'           => $request->input('isi'),
                'file'          => $image->hashName()
            ]);

        }

        if($dokumen){
            //redirect dengan pesan sukses
            return redirect()->route('admin.dokumen.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin.dokumen.index')->with(['error' => 'Data Gagal Diupdate!']);
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
        $dokumen = dokumen::findOrFail($id);
        $image = Storage::disk('local')->delete('public/dokumen/'.basename($dokumen->file));
        $dokumen->delete();

        if($dokumen){
            return response()->json([
                'status' => 'success'
            ]);
        }else{
            return response()->json([
                'status' => 'error'
            ]);
        }
    }
}