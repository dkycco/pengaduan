<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'create'])->name('login');
Route::post('/login/action', [AuthController::class, 'store'])->name('login-action');
Route::get('/logout', [AuthController::class, 'destroy'])->name('logout');

Route::middleware('auth')->group(function() {
    Route::get('/', [BerandaController::class, 'index'])->name('beranda');
    
    Route::get('/pengaduan-baru', [PengaduanController::class, 'pengaduan_baru'])->name('pengaduan-baru');
    Route::post('/pengaduan-baru/store', [PengaduanController::class, 'pengaduan_store'])->name('pengaduan-store');

    Route::get('/tracking', [PengaduanController::class, 'tracking'])->name('tracking');
    Route::get('/tracking/detail/{pengaduan_uuid}', [PengaduanController::class, 'tracking_detail'])->name('tracking-detail');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile/new-password', [ProfileController::class, 'new_password'])->name('new-password');
});
