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
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ================== TEST ==================
Route::get('/test', [DashboardController::class, 'test'])->name('test');

// ================== PROTECTED ROUTES ==================
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Data Master
    Route::get('/data', [DataController::class, 'index'])->name('data');
    Route::get('/setting', [SettingController::class, 'index'])->name('setting');

    // CRUD Masyarakat
    Route::resource('masyarakat', MasyarakatController::class)->only(['index','store','update','destroy']);

    // CRUD Kunjungan
    Route::resource('kunjungan', KunjunganController::class)->only(['index','store','update','destroy']);

    // CRUD Kehamilan
    Route::resource('kehamilan', KehamilanController::class)->only(['index','store','update','destroy']);

    // CRUD Imunisasi
    Route::resource('imunisasi', ImunisasiController::class)->only(['index','store','update','destroy']);

