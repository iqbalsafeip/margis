<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use App\Models\FasilitasItem;
use App\Models\Officer;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($type)
    {
        $officers = Officer::all();
        $data = Fasilitas::all();
        $rooms = Room::where('tipe', $type)->get();
        $tipe = $this->getTypeLabel($type);
        return view('admin.dashboard.rooms.index', compact('officers', 'data', 'rooms', 'tipe', 'type'));
    }
    public function indexDosen($type)
    {

        $officers = Officer::all();
        $data = Fasilitas::all();
        $rooms = Room::where('tipe', $type)->get();
        $tipe = $this->getTypeLabel($type);
        return view('dosen.dashboard.rooms.index', compact('officers', 'data', 'rooms', 'tipe', 'type'));
    }

    private function getTypeLabel($type)
    {
        switch ($type) {
            case 'staff':
                return "Staff";
            case 'kelas':
                return "Kelas";
            case 'dosen':
                return 'Dosen';
            case 'lab':
                return 'Labolatorium';
            case 'lainnya':
                return 'Lainnya';
        }
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
        $data = $request->validate([
            'nama_ruangan' => 'required',
            'fasilitas' => 'required',
            'foto_ruangan' => 'required',
            'petugas' => 'required',
            'type' => 'required',
            'jumlah' => 'required'
        ]);
        if ($request->file('foto_ruangan')) {
            $data['foto_ruangan'] = $request->file('foto_ruangan')->store('foto-ruangan');
        }
        $room = new Room();
        $room->nama_ruangan = $data['nama_ruangan'];
        $room->foto_ruangan = $data['foto_ruangan'];
        $room->petugas = $data['petugas'];
        $room->tipe = $data['type'];
        $room->save();
        foreach ($data['fasilitas'] as $fasilitas) {
            FasilitasItem::create([
                'fasilitas_id' => $fasilitas,
                'room_id' => $room->id,
                'jumlah' => $data['jumlah'][$fasilitas]
            ]);
        }
        return back()->with('toast_success', 'Ruangan berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        return view('admin.dashboard.rooms.index', [
            'room' => $room,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = $request->validate([
            'nama_ruangan' => 'nullable',
            'fasilitas' => 'nullable',
            'foto_ruangan' => 'nullable',
            'petugas' => 'nullable',
            'type' => 'nullable',
            'id' => 'nullable'
        ]);
        $room = Room::find($data['id']);
        $room->nama_ruangan = $data['nama_ruangan'];
        $room->petugas = $data['petugas'];
        if ($request->file('foto_ruangan')) {
            $data['foto_ruangan'] = $request->file('foto_ruangan')->store('foto-ruangan');
            $room->foto_ruangan = $data['foto_ruangan'];
        }
        $room->tipe = $data['type'];
        $room->update();
        if ($request->fasilitas) {
            foreach ($data['fasilitas'] as $fasilitas) {
                FasilitasItem::update([
                    'fasilitas_id' => $fasilitas,
                    'room_id' => $room->id
                ]);
            }
        }
        return back()->with('toast_success', 'Ruangan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $room = Room::find($id);
        $room->delete();
        return back()->with('toast_success', 'Ruangan berhasil dihapus');
    }
}
