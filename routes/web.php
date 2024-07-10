<?php

use App\Http\Controllers\LandingController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\CaraPemesananController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\KotaKeberangkatanController;
use App\Http\Controllers\KotaTujuanController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\PemesananAdminController;
use App\Http\Controllers\PemesananController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [LandingController::class, 'showLandingPage'])->name('home');
Route::get('/profil', [ProfilController::class, 'showProfilPage'])->name('profil');
Route::get('/carapemesanan', [CaraPemesananController::class, 'showCaraPemesananPage'])->name('carapemesanan');

// 
//login
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/pemesanan-admin', [PemesananAdminController::class, 'index'])->name('pemesanan-admin.index');
    Route::get('/pemesanan-admin/{pemesanan}', [PemesananAdminController::class, 'show'])->name('pemesanan-admin.show');
    Route::get('/pemesanan-admin/barang/{pemesanan}', [PemesananAdminController::class, 'showBarang'])->name('pemesanan-admin.show-barang');
    Route::post('/pemesanan-admin/{pemesanan}/konfirmasi', [PemesananAdminController::class, 'konfirmasi'])->name('pemesanan-admin.konfirmasi');
    Route::post('/pemesanan-admin/barang/{pemesanan}/konfirmasi', [PemesananAdminController::class, 'konfirmasiBarang'])->name('pemesanan-admin.konfirmasi-barang');

    Route::post('/pemesanan/{pemesanan}/bayar', [PemesananController::class, 'bayar'])->name('pemesanan.bayar');
    Route::post('/pemesanan/barang/{pemesanan}/bayar', [PemesananController::class, 'bayarBarang'])->name('pemesanan.bayar-barang');
    Route::get('/pemesanan/barang/{pemesanan}', [PemesananController::class, 'showBarang'])->name('pemesanan.show-barang');
    Route::resource('/pemesanan', '\App\Http\Controllers\PemesananController');

    Route::get('/beranda', [BerandaController::class, 'index']);


    //register
    Route::middleware(['web'])->group(function () {
        Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
        Route::post('register', [RegisterController::class, 'register']);
    });

    //home dasboard
    // Route::get('/home/beranda', [BerandaController::class, 'beranda'])->name('home.beranda');
    Route::get('/beranda', [BerandaController::class, 'index'])->name('beranda');
    Route::get('/dashboard', [DashboardController::class, 'beranda']);

    //datakota
    Route::resource('kota_keberangkatan', KotaKeberangkatanController::class);
    Route::resource('kota_tujuan', KotaTujuanController::class);

    Route::resource('customer', 'CustomerController');
    Route::resource('pesan', 'PesanController');

    //mitra
    // Route::get('/mitra', [MitraController::class, 'index'])->name('mitra');
    Route::resource('mitra', MitraController::class);
    Route::get('debug', function () {
        return view('auth.debug');
    });
});
