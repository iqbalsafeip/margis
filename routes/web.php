<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MarketController;
use App\Http\Controllers\OfficerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\DataMarket;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
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

Route::get('/', function (Request $request) {
    $market = DataMarket::with('kecamatan', 'gambar');
    if ($request->get('tipe_market')) {
        $market->where('tipe_market', $request->get('tipe_market'));
    }

    if ($request->get('id_kecamatan')) {
        $market->where('id_kecamatan', $request->get('id_kecamatan'));
    }

    $id_kecamatan = $request->get('id_kecamatan');

    $market = $market->get();
    $kecamatan = Kecamatan::all();

    return view('welcome', compact('market', 'kecamatan', 'id_kecamatan'));
})->name('main');
Route::get('/login', function () {
    return view('login.index');
})->name('login');


Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::post('/', [LoginController::class, 'index'])->name('index');
Route::group(['middleware' => ['auth', 'role:admin']], function () {

    Route::get('/admin/profile', [ProfileController::class, 'index']);
    Route::put('/admin/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
    Route::resource('/admin/user', UserController::class);
    Route::resource('/admin/market', MarketController::class);
    Route::get('/admin/market/{id}/detail', [MarketController::class, 'detail'])->name('market.detail');
    Route::get('/admin/market/{id}/images', [MarketController::class, 'images'])->name('market.images');
    Route::post('/admin/market/{id}/images', [MarketController::class, 'addImages'])->name('market.addImage');
    Route::resource('/admin/officer', OfficerController::class);
    Route::get('/admin/dashboard', [DashboardController::class, 'dashboardAdmin'])->name('dashboardAdmin');
    
    Route::get('export', [MarketController::class, 'exports'])->name('exports');
    // Route::post('/admin/officer', [OfficerController::class, 'store'])->name('store');
});

