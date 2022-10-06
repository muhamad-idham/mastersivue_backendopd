<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['permission:events.index|events.create|events.edit|events.delete']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::latest()->when(request()->q, function($events) {
            $events = $events->where('nama_agenda', 'like', '%'. request()->q . '%');
        })->paginate(10);

        return view('admin.event.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.event.create');
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
            'lokasi_agenda' => 'required',
            'keterangan'    => 'required'
        ]);

        $event = Event::create([
            'nama_agenda'     => $request->input('nama_agenda'),
            'slug'      => Str::slug($request->input('nama_agenda'), '-'),
            'tgl_agenda'   => $request->input('tgl_agenda'),
            'lokasi_agenda'  => $request->input('lokasi_agenda'),
            'keterangan'      => $request->input('keterangan')
        ]);

        if($event){
            //redirect dengan pesan sukses
            return redirect()->route('admin.event.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin.event.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('admin.event.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $this->validate($request, [
            'nama_agenda'   => 'required',
            'tgl_agenda'    => 'required',
            'lokasi_agenda' => 'required',
            'keterangan'    => 'required'
        ]);

        $event = Event::findOrFail($event->id);
        $event->update([
            'nama_agenda'     => $request->input('nama_agenda'),
            'slug'      => Str::slug($request->input('nama_agenda'), '-'),
            'tgl_agenda'   => $request->input('tgl_agenda'),
            'lokasi_agenda'  => $request->input('lokasi_agenda'),
            'keterangan'      => $request->input('keterangan')
        ]);

        if($event){
            //redirect dengan pesan sukses
            return redirect()->route('admin.event.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin.event.index')->with(['error' => 'Data Gagal Diupdate!']);
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
        $event = Event::findOrFail($id);
        $event->delete();

        if($event){
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