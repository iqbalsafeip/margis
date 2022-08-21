<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Report;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reports = Report::all();
        return view('admin.report.index', compact('reports'));
    }
    public function indexDosen()
    {
        $reports = Report::all();
        return view('dosen.report.index', compact('reports'));
    }

    public function laporan(Request $request)
    {

        $periode = $request->get('periode');
        $report = $request->get('report');
        $schedules = Schedule::where('periode', $periode)->get();

        return view('admin.report.main', compact('schedules', 'report'));
    }

    public function mainDosen(Request $request)
    {

        $periode = $request->get('periode');
        $report = $request->get('report');
        $schedules = Schedule::where('periode', $periode)->get();

        return view('dosen.report.main', compact('schedules', 'report'));
    }

    public function media(Request $request)
    {
        $data = $request->validate([
            'photos' => 'required',
            'report' => 'required',
            'skedulid' => 'required'
        ]);
        foreach ($data['photos'] as $photo) {
            Media::create([
                'report_id' => $data['report'],
                'schedule' => $data['skedulid'],
                'photos' => $photo->store('bukti-laporan')
            ]);
        }

        return back()->with('toast_success', 'Bukti laporan berhasil ditambahkan');
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
            'tanggal' => 'required',
            'periode' => 'required',
        ]);
        $report = new Report();
        $report->tanggal = $request->tanggal;
        $report->periode = $request->periode;
        $report->save();
        return back()->with('toast_success', 'Periode laporan telah dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        $report->delete();
        return back()->with('toast_success', 'Laporan kebersihan berhasil dihapus');
    }
}
