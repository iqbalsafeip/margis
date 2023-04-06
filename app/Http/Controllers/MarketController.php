<?php

namespace App\Http\Controllers;

use App\Models\DataMarket;
use App\Models\Kecamatan;
use App\Models\Officer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

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

    public function images($id){
        $market = DataMarket::findOrFail($id);
        $kecamatan = Kecamatan::all();
        return view('admin.market.images', compact('market', 'kecamatan'));
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

        // dd($request);
        $data = $request->validate([
            'nama_petugas' => 'string',
            'no_hp' => 'string',
            'foto' => 'image',
            'ktp' => 'image',
        ]);

        if ($request->file('foto')) {
            $data['foto'] = $request->file('foto')->store('foto-petugas');
        }
        if ($request->file('ktp')) {
            $data['ktp'] = $request->file('ktp')->store('ktp-petugas');
        }
        Officer::create($data);
        return redirect()->route('officer.index')->with('toast_success', 'Petugas berhasil ditambahkan');
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
    public function destroy(Officer $officer)
    {
        $officer->delete();
        return back()->with('toast_success', 'Petugas berhasil dihapus');
    }
}
