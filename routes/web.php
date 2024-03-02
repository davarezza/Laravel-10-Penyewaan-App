<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\KendaraanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PemesananController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [AdminController::class, 'home'])->name('admin.home');
    Route::get('/pemesanan', [PemesananController::class, 'index'])->name('pemesanan.index');
    Route::get('/export', [AdminController::class, 'export'])->name('export');
    Route::get('/aktivitas', [AdminController::class, 'aktivitas'])->name('admin.aktivitas');
    Route::delete('/aktivitas/delete', [AdminController::class, 'deleteAll'])->name('aktivitas.delete');
    Route::get('/grafik', [AdminController::class, 'grafik'])->name('admin.grafik');
    Route::patch('/pemesanan/{id}/approve', [PemesananController::class, 'approve'])->name('pemesanan.approve');
});

Route::resource('kendaraan', KendaraanController::class)->middleware('admin');
Route::resource('pemesanan', PemesananController::class)->middleware('admin')->except(['index']);
