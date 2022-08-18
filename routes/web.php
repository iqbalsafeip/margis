<?php

use App\Http\Controllers\AreaController;
use App\Http\Controllers\FasilitasController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OfficerController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\SopController;
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
    Route::resource('/admin/officer', OfficerController::class);
    Route::resource('/admin/area', AreaController::class);
    Route::resource('/admin/fasilitas', FasilitasController::class);
    Route::resource('/admin/schedules', ScheduleController::class);
    Route::get('/admin/dashboard/rooms/{rooms:type}', [RoomController::class, 'index']);
    Route::post('/admin/dashboard/rooms', [RoomController::class, 'store'])->name('store');
    Route::post('/admin/dashboard/rooms/{id}/edit', [RoomController::class, 'edit'])->name('edit');
    Route::post('/admin/dashboard/rooms/update', [RoomController::class, 'update'])->name('update');
    Route::delete('/admin/dashboard/rooms/{id}', [RoomController::class, 'destroy'])->name('destroy');
    // Route::post('/admin/officer', [OfficerController::class, 'store'])->name('store');
});

Route::group(['middleware' => ['auth', 'role:dosen']], function () {
    Route::get('/dosen/dashboard', function () {
        return view('dosen.dashboard.index');
    });
});

Route::get('/admin/sop/schedule', function () {
    return view('admin.sop.schedule.index');
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
Route::get('/dosen/dashboard', function () {
    return view('dosen.dashboard.index');
});
Route::get('/dosen/sop', function () {
    return view('dosen.sop.index');
});
Route::get('/dosen/sop/schedule', function () {
    return view('dosen.sop.schedule.index');
});
Route::get('/dosen/schedules', function () {
    return view('dosen.schedules.index');
});
Route::get('/dosen/report', function () {
    return view('dosen.report.index');
});
Route::get('/dosen/report/main', function () {
    return view('dosen.report.main.index');
});
Route::get('/dosen/profile', function () {
    return view('dosen.profile.index');
});
