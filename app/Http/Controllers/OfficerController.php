<?php

namespace App\Http\Controllers;

use App\Models\Officer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OfficerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $officers = Officer::all();
        return view('admin.officer.index', compact('officers'));
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
            'jabatan' => 'string',
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
