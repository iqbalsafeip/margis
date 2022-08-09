<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login.index');
})->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::post('/', [LoginController::class, 'index'])->name('index');
Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard.index');
    });
    Route::resource('/admin/user', UserController::class);
    Route::post('users', [UserController::class, 'store']);
});

Route::group(['middleware' => ['auth', 'role:pimpinan']], function () {
    Route::get('/pimpinan/dashboard', function () {
        return view('pimpinan.dashboard.index');
    });
});

Route::get('/admin/sop', function () {
    return view('admin.sop.index');
});
Route::get('/admin/sop/schedule', function () {
    return view('admin.sop.schedule.index');
});
Route::get('/admin/schedules', function () {
    return view('admin.schedules.index');
});
Route::get('/admin/rooms', function () {
    return view('admin.rooms.index');
});
Route::get('/admin/dashboard/rooms/staff', function () {
    return view('admin.dashboard.rooms.staff.index');
});
Route::get('/admin/dashboard/rooms/class', function () {
    return view('admin.dashboard.rooms.class.index');
});
Route::get('/admin/dashboard/rooms/pimpinan', function () {
    return view('admin.dashboard.rooms.pimpinan.index');
});
Route::get('/admin/dashboard/rooms/lab', function () {
    return view('admin.dashboard.rooms.lab.index');
});
Route::get('/admin/dashboard/rooms/etc', function () {
    return view('admin.dashboard.rooms.etc.index');
});
Route::get('/admin/profile', function () {
    return view('admin.profile.index');
});
Route::get('/admin/report', function () {
    return view('admin.report.index');
});
Route::get('/admin/report/main', function () {
    return view('admin.report.main.index');
});
Route::get('/pimpinan/dashboard', function () {
    return view('pimpinan.dashboard.index');
});
Route::get('/pimpinan/dashboard/rooms/staff', function () {
    return view('pimpinan.dashboard.rooms.staff.index');
});
Route::get('/pimpinan/dashboard/rooms/class', function () {
    return view('pimpinan.dashboard.rooms.class.index');
});
Route::get('/pimpinan/dashboard/rooms/pimpinan', function () {
    return view('pimpinan.dashboard.rooms.pimpinan.index');
});
Route::get('/pimpinan/dashboard/rooms/lab', function () {
    return view('pimpinan.dashboard.rooms.lab.index');
});
Route::get('/pimpinan/dashboard/rooms/etc', function () {
    return view('pimpinan.dashboard.rooms.etc.index');
});
Route::get('/pimpinan/sop', function () {
    return view('pimpinan.sop.index');
});
Route::get('/pimpinan/sop/schedule', function () {
    return view('pimpinan.sop.schedule.index');
});
Route::get('/pimpinan/schedules', function () {
    return view('pimpinan.schedules.index');
});
Route::get('/pimpinan/report', function () {
    return view('pimpinan.report.index');
});
Route::get('/pimpinan/report/main', function () {
    return view('pimpinan.report.main.index');
});
Route::get('/pimpinan/profile', function () {
    return view('pimpinan.profile.index');
});
