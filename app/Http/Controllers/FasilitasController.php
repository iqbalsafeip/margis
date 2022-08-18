<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use Illuminate\Http\Request;

class FasilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Fasilitas::all();
        return view('admin.fasilitas.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_fasilitas' => 'string',
        ]);
        $fasilitas = new Fasilitas();
        $fasilitas->nama_fasilitas = $request->nama_fasilitas;
        $fasilitas->save();
        return redirect()->route('fasilitas.index')->with('toast_success', 'Fasilitas berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function show(Fasilitas $fasilitas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function edit(Fasilitas $fasilitas)
    {
        return view('admin.fasilitas.index', [
            'fasilitas' => $fasilitas,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_fasilitas' => 'string',
        ]);

        // dd($request->all());
        $fasilitas = Fasilitas::find($id);
        $fasilitas->nama_fasilitas = $request->nama_fasilitas;
        $fasilitas->save();
        return redirect()->route('fasilitas.index')->with('toast_success', 'Fasilitas berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fasilitas $fasilitas, $id)
    {
        $fasilitas = Fasilitas::find($id);
        $fasilitas->delete();
        return back()->with('toast_success', 'Fasiltas Berhasil Dihapus');
    }
}
