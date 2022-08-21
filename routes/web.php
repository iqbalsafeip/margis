<?php

use App\Http\Controllers\AreaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FasilitasController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OfficerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
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

    Route::get('/admin/profile', [ProfileController::class, 'index']);
    Route::put('/admin/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
    Route::resource('/admin/user', UserController::class);
    Route::resource('/admin/officer', OfficerController::class);
    Route::resource('/admin/area', AreaController::class);
    Route::resource('/admin/fasilitas', FasilitasController::class);
    Route::resource('/admin/schedules', ScheduleController::class);
    Route::resource('/admin/sop', SopController::class);
    Route::get('/admin/dashboard', [DashboardController::class, 'dashboardAdmin']);
    Route::get('/admin/dashboard/rooms/{rooms:type}', [RoomController::class, 'index']);
    Route::post('/admin/dashboard/rooms', [RoomController::class, 'store'])->name('store');
    Route::post('/admin/dashboard/rooms/{id}/edit', [RoomController::class, 'edit'])->name('edit');
    Route::post('/admin/dashboard/rooms/update', [RoomController::class, 'update'])->name('update');
    Route::delete('/admin/dashboard/rooms/{id}', [RoomController::class, 'destroy'])->name('destroy');
    Route::resource('/admin/report', ReportController::class);
    Route::get('laporan', [ReportController::class, 'laporan'])->name('laporan');
    Route::post('media', [ReportController::class, 'media'])->name('media');
    // Route::post('/admin/officer', [OfficerController::class, 'store'])->name('store');
});

Route::group(['middleware' => ['auth', 'role:dosen']], function () {
    Route::get('/dosen/dashboard', function () {
        return view('dosen.dashboard.index');
    });

    Route::get('/dosen/dashboard', [DashboardController::class, 'dashboarddosen']);
    Route::get('/dosen/dashboard/rooms/{rooms:type}', [RoomController::class, 'indexDosen']);
    Route::get('/dosen/sop', [SopController::class, 'indexDosen']);
    Route::get('/dosen/schedules', [ScheduleController::class, 'indexDosen']);
    Route::get('/dosen/report', [ReportController::class, 'indexDosen']);
    Route::get('/dosen/officer', [OfficerController::class, 'indexDosen']);
    Route::get('main', [ReportController::class, 'mainDosen'])->name('mainDosen');
});
