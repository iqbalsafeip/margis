<?php

namespace App\Http\Controllers;

use App\Imports\ImportMarket;
use App\Models\DataMarket;
use App\Models\ImageMarket;
use App\Models\Kecamatan;
use App\Models\Officer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Maatwebsite\Excel\Facades\Excel;

class MarketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $markets = DataMarket::all();
        $kecamatan = Kecamatan::all();
        return view('admin.market.index', compact('markets', 'kecamatan'));
    }
    public function detail($id)
    {
        $market = DataMarket::findOrFail($id);
        $kecamatan = Kecamatan::all();
        // dd(URL::to('/'));
        return view('admin.market.detail', compact('market', 'kecamatan'));
    }
    public function indexDosen()
    {
        $officers = Officer::all();
        return view('dosen.officer.index', compact('officers'));
    }

    public function images($id)
    {
        $market = DataMarket::findOrFail($id);
        $kecamatan = Kecamatan::all();
        return view('admin.market.images', compact('market', 'kecamatan'));
    }


    public function addImages($id, Request $request)
    {
        $index = 0;
        if ($request->gambar) {

            foreach ($request->gambar as $file) {
                $image = new ImageMarket();
                $image->id_market = $id;
                $ext = $file->getClientOriginalExtension();
                $imageName = time() . '.ID-' . $index . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('gambar'), $imageName);
                $image->doc = $imageName;
                $image->save();
                $index++;
            }
        }
        return back()->with('toast_success', 'berhasil menambahkan gamabar');;
    }

    public function exports()
    {
        return Excel::download(new ImportMarket, 'market.xlsx');
    }

    public function deleteImage($id)
    {
        $image = ImageMarket::findOrFail($id);
        $image->delete();

        return back();
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
        $data = $request->all();
        $market = new DataMarket();
        foreach($data as $d => $f){
            if($d != '_token'){
                $market->$d = $f;
            }
        }

        $market->save();

        return back()->with('toast_success', 'Petugas berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Officer  $officer
     * @return \Illuminate\Http\Response
     */
    public function show(Officer $officer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Officer  $officer
     * @return \Illuminate\Http\Response
     */
    public function edit(Officer $officer)
    {
        return view('admin.officer.index', [
            'officer' => $officer,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Officer  $officer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Officer $officer)
    {
        $data = $request->validate([
            'nama_petugas' => 'string',
            'jabatan' => 'string',
            'no_hp' => 'string',
            'foto' => 'image',
            'ktp' => 'image'
        ]);

        if ($request->file('foto')) {
            $data['foto'] = $request->file('foto')->store('foto-petugas');
        }
        if ($request->file('ktp')) {
            $data['ktp'] = $request->file('ktp')->store('ktp-petugas');
        }
        $officer->nama_petugas = $request->nama_petugas;
        $officer->jabatan = $request->jabatan;
        $officer->no_hp = $request->no_hp;
        $officer->save();
        return redirect()->route('officer.index')->with('toast_success', 'Petugas berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Officer  $officer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $market = DataMarket::findOrFail($id);

        $market->delete();
        return back()->with('toast_success', 'market berhasil dihapus');
    }
}
