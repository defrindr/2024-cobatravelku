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
Route::get('/beranda', [BerandaController::class, 'index']);

//login
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

//register
Route::middleware(['web'])->group(function () {
    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [RegisterController::class, 'register']);
});

//home dasboard
// Route::get('/home/beranda', [BerandaController::class, 'beranda'])->name('home.beranda');
Route::get('/beranda', [BerandaController::class, 'index'])->name('beranda');
Route::get('/dashboard', [DashboardController::class, 'beranda']);

Route::get('/', [LandingController::class, 'showLandingPage'])->name('home');
Route::get('/profil', [ProfilController::class, 'showProfilPage'])->name('profil');
Route::get('/carapemesanan', [CaraPemesananController::class, 'showCaraPemesananPage'])->name('carapemesanan');

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

