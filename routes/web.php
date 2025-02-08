<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KondisiController;
use App\Http\Controllers\InputController;
use App\Http\Controllers\InputMuatanController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');


// LOGIN
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
// Menampilkan form registrasi
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');

// Proses registrasi
Route::post('register', [RegisterController::class, 'register']);

Route::middleware(['auth'])->group(function () {

    Route::get('/karyawan', [DashboardController::class, 'index'])->name('karyawan');





    //Jadwal
    Route::get('/jadwal-read', [JadwalController::class, 'JadwalRead'])->name('jadwal-read');
    Route::get('/jadwal-create', [JadwalController::class, 'JadwalCreate'])->name('jadwal-create');
    Route::post('/jadwal-create', [JadwalController::class, 'JadwalAdd'])->name('jadwal-add');
    Route::delete('/jadwal-read/{id}', [JadwalController::class, 'Delete'])->name('jadwal-delete');
    Route::get('/jadwal-edit/{id}', [JadwalController::class, 'EditJadwal'])->name('jadwal-edit');
    Route::put('/jadwal-update/{id}', [JadwalController::class, 'UpdateJadwal'])->name('jadwal-update');
    Route::get('/jadwal/search', [JadwalController::class, 'search'])->name('jadwal.search');



    //Input Data Harian
    Route::get('/inputdataharian-read', [InputController::class, 'InputRead'])->name('input-read');
    Route::get('/inputdataharian-look/{id}', [InputController::class, 'InputLook'])->name('input-lihat');
    Route::get('/inputdataharian-create', [InputController::class, 'InputCreate'])->name('input-create');
    Route::post('/inputdataharian-create', [InputController::class, 'InputAdd'])->name('input-add');
    Route::delete('/inputdataharian-read/{id}', [InputController::class, 'Delete'])->name('input-delete');
    Route::get('/inputdataharian-edit/{id}', [InputController::class, 'EditInput'])->name('input-edit');
    Route::put('/inputdataharian-update/{id}', [InputController::class, 'UpdateInput'])->name('input-update');

    //Kondisi Harian
    Route::get('/kondisiharian-read', [KondisiController::class, 'KondisiRead'])->name('kondisi-read');
    Route::get('/kondisiharian-look/{id}', [KondisiController::class, 'KondisiLook'])->name('kondisi-lihat');
    Route::get('/kondisiharian-create', [KondisiController::class, 'KondisiCreate'])->name('kondisi-create');
    Route::post('/kondisiharian/create', [KondisiController::class, 'KondisiAdd'])->name('kondisi-add');
    Route::delete('/kondisiharian-read/{id}', [KondisiController::class, 'Delete'])->name('kondisi-delete');
    Route::get('/kondisiharian-edit/{id}', [KondisiController::class, 'EditKondisi'])->name('kondisi-edit');
    Route::put('/kondisiharian/update/{id}', [KondisiController::class, 'UpdateKondisi'])->name('kondisi-update');


    //Input Data Muatan
    Route::get('/inputdatamuatan-read', [InputMuatanController::class, 'InputMuatanRead'])->name('inputmuatan-read');
    Route::get('/inputdatamuatan-look/{id}', [InputMuatanController::class, 'InputMuatanLook'])->name('inputmuatan-lihat');
    Route::get('/inputdatamuatan-create', [InputMuatanController::class, 'InputMuatanCreate'])->name('inputmuatan-create');
    Route::post('/inputdatamuatan-create', [InputMuatanController::class, 'InputMuatanAdd'])->name('inputmuatan-add');
    Route::delete('/inputdatamuatan-read/{id}', [InputMuatanController::class, 'Delete'])->name('inputmuatan-delete');
    Route::get('/inputdatamuatan-edit/{id}', [InputMuatanController::class, 'EditInputMuatan'])->name('inputmuatan-edit');
    Route::put('/inputdatamuatan-update/{id}', [InputMuatanController::class, 'UpdateInputMuatan'])->name('inputmuatan-update');

});
