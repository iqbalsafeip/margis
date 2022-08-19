<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboardAdmin()
    {
        $rooms = Room::count();
        // $tipe = $this->getTypeLabel($type);
        return view('admin.dashboard.index', compact('rooms'));
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
            case 'lecturer':
                return 'Dosen';
            case 'lab':
                return 'Labolatorium';
            case 'etc':
                return 'Lainnya';
        }
    }
}
