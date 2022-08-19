<?php

namespace App\Http\Controllers;

use App\Models\Sop;
use Illuminate\Http\Request;

class SopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sops = Sop::all();
        return view('admin.sop.index', compact('sops'));
    }
    public function indexDosen()
    {
        $sops = Sop::all();
        return view('dosen.sop.index', compact('sops'));
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
        $document =  $request->validate([
            'nama_sop' => 'required',
            'file_sop' => 'required|mimes:pdf,word',
        ]);

        if ($request->file('file_sop')) {
            $document['file_sop'] = $request->file('file_sop')->store('SOP-ITG');
        }
        Sop::create($document);
        return back()->with('toast_success', 'SOP berhasil ditambahkan');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sop  $sop
     * @return \Illuminate\Http\Response
     */
    public function show(Sop $sop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sop  $sop
     * @return \Illuminate\Http\Response
     */
    public function edit(Sop $sop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sop  $sop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sop $sop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sop  $sop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sop $sop)
    {
        $sop->delete();
        return back()->with('toast_success', 'SOP berhasil dihapus');
    }
}
