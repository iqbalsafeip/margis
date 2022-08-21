<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboardAdmin()
    {
        // $rooms = Room::count();

        $count = [
            'staff' => count(Room::where('tipe', 'staff')->get()),
            'kelas' => count(Room::where('tipe', 'kelas')->get()),
            'dosen' => count(Room::where('tipe', 'dosen')->get()),
            'lab' => count(Room::where('tipe', 'lab')->get()),
            'lainnya' => count(Room::where('tipe', 'lainnya')->get())
        ];
        // $tipe = $this->getTypeLabel($type);
        return view('admin.dashboard.index', compact('count'));
    }
    public function dashboardDosen()
    {
        $rooms = Room::count();
        // $tipe = $this->getTypeLabel($type);
        return view('dosen.dashboard.index', compact('rooms'));
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
}
