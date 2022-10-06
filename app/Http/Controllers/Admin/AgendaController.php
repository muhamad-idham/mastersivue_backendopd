<?php

namespace App\Http\Controllers\Admin;

use App\Models\Agenda;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AgendaController extends Controller
{
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['permission:agendas.index|agendas.create|agendas.edit|agendas.delete']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agendas = Agenda::latest()->when(request()->q, function($agendas) {
            $agendas = $agendas->where('nama_agenda', 'like', '%'. request()->q . '%');
        })->paginate(10);

        return view('admin.agenda.index', compact('agendas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.agenda.create');
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
            'nama_agenda'   => 'required',
            'tgl_agenda'    => 'required',
            'waktu'    => 'required',
            'lokasi_agenda' => 'required',
            'keterangan'    => 'required'
        ]);

        $agenda = Agenda::create([
            'nama_agenda'     => $request->input('nama_agenda'),
            'slug'      => Str::slug($request->input('nama_agenda'), '-'),
            'tgl_agenda'   => $request->input('tgl_agenda'),
            'waktu'   => $request->input('waktu'),
            'lokasi_agenda'  => $request->input('lokasi_agenda'),
            'keterangan'      => $request->input('keterangan')
        ]);

        if($agenda){
            //redirect dengan pesan sukses
            return redirect()->route('admin.agenda.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin.agenda.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Agenda $agenda)
    {
        return view('admin.agenda.edit', compact('agenda'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agenda $agenda)
    {
        $this->validate($request, [
            'nama_agenda'   => 'required',
            'tgl_agenda'    => 'required',
            'lokasi_agenda' => 'required',
            'keterangan'    => 'required'
        ]);

        $agenda = Agenda::findOrFail($agenda->id);
        $agenda->update([
            'nama_agenda'     => $request->input('nama_agenda'),
            'slug'      => Str::slug($request->input('nama_agenda'), '-'),
            'tgl_agenda'   => $request->input('tgl_agenda'),
            'lokasi_agenda'  => $request->input('lokasi_agenda'),
            'keterangan'      => $request->input('keterangan')
        ]);

        if($agenda){
            //redirect dengan pesan sukses
            return redirect()->route('admin.agenda.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin.agenda.index')->with(['error' => 'Data Gagal Diupdate!']);
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
        $agenda = Agenda::findOrFail($id);
        $agenda->delete();

        if($agenda){
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