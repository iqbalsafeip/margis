<?php

namespace App\Http\Controllers;

use App\Models\DataMarket;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboardAdmin()
    {
        $kecamatan = DB::select(DB::raw("SELECT COUNT(dm.id_kecamatan) as total, k.name FROM data_markets dm JOIN kecamatans k ON dm.id_kecamatan=k.id GROUP BY k.name"));
        $type = DB::select(DB::raw("SELECT COUNT(dm.tipe_market) as total, dm.tipe_market FROM data_markets dm GROUP BY dm.tipe_market"));
        foreach ($kecamatan as $kc) {
            $markets = DB::select(DB::raw("SELECT COUNT(dm.tipe_market) as total, dm.tipe_market FROM data_markets dm JOIN kecamatans k ON dm.id_kecamatan=k.id WHERE k.name='$kc->name' GROUP BY dm.tipe_market "));
            $kc->market = $markets;
        }
        $total = count(DataMarket::all());
        return view('admin.dashboard.index', compact('kecamatan', 'type', 'total'));
    }
    public function dashboardDosen()
    {
        $rooms = Room::count();
        // $tipe = $this->getTypeLabel($type);
        return view('dosen.dashboard.index', compact('rooms'));
    }
   
}
