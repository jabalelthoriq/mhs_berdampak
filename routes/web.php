<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\KunjunganController;
use App\Http\Controllers\KehamilanController;
use App\Http\Controllers\ImunisasiController;

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
    // CRUD Masyarakat
    Route::resource('masyarakat', MasyarakatController::class)->only(['index','store','update','destroy']);

    // CRUD Kunjungan
    Route::resource('kunjungan', KunjunganController::class)->only(['index','store','update','destroy']);

    // CRUD Kehamilan
    Route::resource('kehamilan', KehamilanController::class)->only(['index','store','update','destroy']);

    // CRUD Imunisasi
    Route::resource('imunisasi', ImunisasiController::class)->only(['index','store','update','destroy']);


    // Setting
    Route::get('/setting', [SettingController::class, 'index'])->name('setting');
    Route::post('/setting/update', [SettingController::class, 'updateProfile'])->name('update.profile');
    Route::post('/setting/update-password', [SettingController::class, 'updatePassword'])->name('update.password');
    Route::post('/setting/send-reset-link', [SettingController::class, 'sendResetLink'])->name('password.email');
    Route::get('/reset-password/{token}', [SettingController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password', [SettingController::class, 'resetPassword'])->name('password.update');
