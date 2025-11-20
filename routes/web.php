<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\SettingController;


// ================== AUTH ==================
Route::get('/', [AuthController::class, 'showLandingForm'])->name('landing.form');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ================== TEST ==================
Route::get('/test', [DashboardController::class, 'test'])->name('test');

// ================== PROTECTED ROUTES ==================
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


    // Data Master
    Route::get('/data', [DataController::class, 'index'])->name('data');



    // Setting
    Route::get('/setting', [SettingController::class, 'index'])->name('setting');
    Route::post('/setting/update', [SettingController::class, 'updateProfile'])->name('update.profile');
    Route::post('/setting/update-password', [SettingController::class, 'updatePassword'])->name('update.password');
    // Route::post('/setting/send-reset-link', [SettingController::class, 'sendResetLink'])->name('password.email');
    // Route::get('/reset-password/{token}', [SettingController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password', [SettingController::class, 'resetPassword'])->name('password.update');


    // CRUD Orang Tua
Route::post('/orangtua/store', [DataController::class, 'storeOrangtua'])->name('orangtua.store');
Route::put('/orangtua/update/{id}', [DataController::class, 'updateOrangtua'])->name('orangtua.update');
Route::delete('/orangtua/delete/{id}', [DataController::class, 'destroyOrangtua'])->name('orangtua.destroy');

// CRUD Anak
Route::post('/anak/store', [DataController::class, 'storeAnak'])->name('anak.store');
Route::put('/anak/update/{id}', [DataController::class, 'updateAnak'])->name('anak.update');
Route::delete('/anak/delete/{id}', [DataController::class, 'destroyAnak'])->name('anak.destroy');

// CRUD Pelayanan
Route::post('/pelayanan/store', [DataController::class, 'storePelayanan'])->name('pelayanan.store');
Route::put('/pelayanan/update/{id}', [DataController::class, 'updatePelayanan'])->name('pelayanan.update');
Route::delete('/pelayanan/delete/{id}', [DataController::class, 'destroyPelayanan'])->name('pelayanan.destroy');
