<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriData;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KategoriDataController extends Controller
{
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['permission:katdatas.index|katdatas.create|katdatas.edit|katdatas.delete']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $data = KategoriData::latest()->when(request()->q, function($data) {
            $data = $data->where('kategori', 'like', '%'. request()->q . '%');
        })->paginate(10);

        return view('admin.kategoridata.index', compact('data'));
    }

    public function create()
    {
        return view('admin.kategoridata.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required',
            'isi' => 'required',
            'data_id' => 'required',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->input('kategori'), '-');

        $data = KategoriData::create($data);
        // dd($data);

        return redirect()->route('admin.kategoridata.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = KategoriData::findOrFail($id);

        return view('admin.kategoridata.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kategori' => 'required',
            'isi' => 'required',
            'data_id' => 'required',
        ]);

        $data = KategoriData::findOrFail($id);
        $in = $request->all();
        $in['slug'] = Str::slug($request->input('kategori'), '-');
        $data->update($in);

        return redirect()->route('admin.kategoridata.index')->with('success', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $data = KategoriData::findOrFail($id);
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
