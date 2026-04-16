<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RumahController;
use App\Http\Controllers\TipeRumahController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;

// ============= PUBLIK (Tidak perlu login) =============
Route::get('/', [RumahController::class, 'home']);
Route::get('/detail/{id}', [RumahController::class, 'detailUser']);

// ============= AUTH ROUTES =============
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ============= ADMIN ROUTES (Perlu login + role admin) =============
Route::middleware(['auth', 'is.admin'])->group(function () {
    // Dashboard admin
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin', [AdminController::class, 'index']); // Alias

    // Rumah management
    Route::get('/rumah', [RumahController::class, 'index']);
    Route::get('/rumah/create', [RumahController::class, 'create']);
    Route::post('/rumah', [RumahController::class, 'store']);
    Route::get('/rumah/edit/{id}', [RumahController::class, 'edit']);
    Route::post('/rumah/update/{id}', [RumahController::class, 'update']);
    Route::delete('/rumah/delete/{id}', [RumahController::class, 'destroy']);
    Route::get('/rumah/{id}', [RumahController::class, 'show']);

    // Tipe Rumah management
    Route::get('/tiperumah', [TipeRumahController::class, 'index']);
    Route::get('/tiperumah/create', [TipeRumahController::class, 'create']);
    Route::post('/tiperumah', [TipeRumahController::class, 'store']);
    Route::get('/tiperumah/{id}/edit', [TipeRumahController::class, 'edit']);
    Route::put('/tiperumah/{id}', [TipeRumahController::class, 'update']);
    Route::delete('/tiperumah/{id}', [TipeRumahController::class, 'destroy']);
});