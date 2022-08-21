<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\AreaTugasItem;
use App\Models\Fasilitas;
use App\Models\Officer;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areas = Area::all();
        $officers = Officer::all();
        $schedules = Schedule::all();
        return view('admin.schedules.index', compact('areas', 'officers', 'schedules'));
    }
    public function indexDosen()
    {
        $areas = Area::all();
        $officers = Officer::all();
        $schedules = Schedule::all();
        return view('dosen.schedules.index', compact('areas', 'officers', 'schedules'));
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
            'periode' => 'required',
            'area' => 'required',
            'petugas' => 'required'
        ]);

        $schedule = new Schedule();
        $schedule->periode = $data['periode'];
        $schedule->officer_id = $data['petugas'];
        $schedule->save();
        foreach ($data['area'] as $area) {
            AreaTugasItem::create([
                'area_id' => $area,
                'schedule_id' => $schedule->id
            ]);
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedule $schedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schedule $schedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {
        //
    }
}
