<?php

use Illuminate\Support\Facades\Route;
use App\http\controllers\UserController;
use App\http\controllers\PinjamansController;
use App\http\controllers\CicilanController;
use App\http\controllers\SimpananController;
use App\http\controllers\PenganjuanPinjamansController;
use App\http\controllers\LoginController;
use App\http\controllers\LaporanController;
use App\http\controllers\FeedbackController;
use App\http\controllers\ProfileController;

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

Route::get('/dashboard', function () {
    return view('dashboard.content');
})->name('dashboard');

// Route::get('/dashboard', function () {
//     return view('dashboardAnggota.content');
// });

Route::get('/', [LoginController::class, 'index'])->name('login');

Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/logout', [LoginController::class, 'logout']);



Route::get('/registrasi', 'App\Http\Controllers\LoginController@registrasi');
Route::post('/registrasiProses', 'App\Http\Controllers\LoginController@registrasiProses');

Route::get(
    '/pengajuan/{id}/{status}',
    'App\Http\Controllers\PenganjuanPinjamansController@edit_status'
    // return view('admin.antrian.edit');
);



Route::resource('user', UserController::class);
Route::get('user/{user}/history', [UserController::class, 'history'])->name('history');


Route::resource('pinjaman', PinjamansController::class);
Route::get('pinjaman/{pinjaman}/history', [PinjamansController::class, 'history'])->name('history');
Route::get('history', [PinjamansController::class, 'history'])->name('history');
Route::get('pinjaman/{pinjaman}/print', [PinjamansController::class, 'history_print'])->name('history.print');

Route::resource('cicilan', CicilanController::class);

Route::resource('simpanan', SimpananController::class);

Route::resource('pengajuan', PenganjuanPinjamansController::class);

Route::resource('feedback', FeedbackController::class);

Route::resource('profile', ProfileController::class);

//cetak laporan
Route::get('/cetakuser', [LaporanController::class, 'cetakuser']);
Route::get('/cetaksimpanan', [LaporanController::class, 'cetaksimpanan']);
Route::get('/cetakpinjaman', [LaporanController::class, 'cetakpinjaman']);
Route::get('/cetakcicilan', [LaporanController::class, 'cetakcicilan']);

// Laporan shu
Route::get('/laporan-shu', [LaporanController::class, 'laporan_shu'])->name('laporan.shu');
Route::get('/laporan-shu/{tahun}', [LaporanController::class, 'cetak_laporan_shu'])->name('cetak.laporan.shu');

Route::get('/hello', function () {
    return view('view');
});
