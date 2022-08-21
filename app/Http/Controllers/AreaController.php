<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Fasilitas;
use App\Models\FasilitasItem;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Fasilitas::all();
        $areas = Area::all();
        return view('admin.area.index', compact('data', 'areas'));
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
        // dd($request->all());
        $data = $request->validate([
            'area_tugas' => 'required',
            'fasilitas' => 'required',
        ]);

        $area = new Area();
        $area->area_tugas = $data['area_tugas'];
        $area->save();
        foreach ($data['fasilitas'] as $fasilitas) {
            FasilitasItem::create([
                'fasilitas_id' => $fasilitas,
                // 'room_id' => $area->id,
                'area_id' => $area->id,
                // 'jumlah' => $data['jumlah'][$fasilitas]
            ]);
        }
        return back()->with('toast_success', 'Area berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function show(Area $area)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function edit(Area $area)
    {
        return view('admin.area.index', [
            'area' => $area,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'area_tugas' => 'string',
            'fasilitas' => 'string',
        ]);
        $area = Area::find($id);
        $area->area_tugas = $request->area_tugas;
        foreach ($data['fasilitas'] as $fasilitas) {
            FasilitasItem::create([
                'fasilitas_id' => $fasilitas,
                'room_id' => $area->id,
                'jumlah' => $data['jumlah'][$fasilitas]
            ]);
        }
        $area->fasilitas = $request->fasilitas;
        $area->save();
        return redirect()->route('area.index')->with('toast_success', 'Area tugas berhasil dibuat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $area = Area::find($id);
        $area->delete();
        return back()->with('toast_success', 'Area tugas berhasil dihapus');
    }
}
