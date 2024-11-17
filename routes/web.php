<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route untuk Dashboard sesuai dengan status pekerjaan
Route::middleware(['auth'])->group(function () {
    Route::get('/superadmin/dashboard', [AuthController::class, 'superadminDashboard'])->name('superadmin.dashboard');
    Route::get('/kasir/dashboard', [AuthController::class, 'kasirDashboard'])->name('kasir.dashboard');
});