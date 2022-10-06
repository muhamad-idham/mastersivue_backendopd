<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DataStatis;
use App\Models\KategoriData;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DataStatisController extends Controller
{   
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['permission:datastatis.index|datastatis.create|datastatis.edit|datastatis.delete']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $datastatis = DataStatis::latest()->when(request()->q, function($datastatis) {
            $datastatis = $datastatis->where('judul', 'like', '%'. request()->q . '%');
        })->paginate(10);

        return view('admin.datastatis.index', compact('datastatis'));
    }

    public function create()
    {
        $kategoridata = KategoriData::where('data_id', '0')->get();
        return view('admin.datastatis.create', compact('kategoridata'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'kategori_id' => 'required',
            'file' => 'required|max:2048',
        ]);
        $data = $request->all();
        // save file in storage
        $file = $request->file('file');
        $file->storeAs('public/datastatis', $file->hashName());

        $data['file'] = $file->hashName();

        $data['slug'] = Str::slug($request->input('judul'), '-');

        $data = DataStatis::create($data);
        // dd($data);

        return redirect()->route('admin.datastatis.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = DataStatis::findOrFail($id);
        $kategoridata = KategoriData::where('data_id', '0')->get();
        return view('admin.datastatis.edit', compact('data', 'kategoridata'));
    }

    public function update(Request $request, $id)
    {
        $get = DataStatis::findOrFail($id);
        // dd($get);
        
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'kategori_id' => 'required',
        ]);
        $data = $request->all();
        // save file in storage
        $file = $request->file('file');
        if ($file) {
            //remove old image
            Storage::disk('local')->delete('public/datastatis/' . $get->file);
            $file->storeAs('public/datastatis', $file->hashName());
            $data['file'] = $file->hashName();
        }else{
            $data['file'] = $get->file;
        }


        $data['slug'] = Str::slug($request->input('judul'), '-');

        $data = DataStatis::findOrFail($id)->update($data);
        // dd($data);
        return redirect()->route('admin.datastatis.index')->with('success', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $data = DataStatis::findOrFail($id);
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
