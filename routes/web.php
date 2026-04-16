<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RumahController;
use App\Http\Controllers\TipeRumahController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('index');
});
Route::get('/admin', [AdminController::class, 'index']);

Route::get('/rumah', [RumahController::class, 'index']);
Route::get('/rumah/create', [RumahController::class, 'create']);
Route::post('/rumah', [RumahController::class, 'store']);
Route::get('/rumah/edit/{id}', [RumahController::class, 'edit']);
Route::post('/rumah/update/{id}', [RumahController::class, 'update']);
Route::delete('/rumah/delete/{id}', [RumahController::class, 'destroy']);
Route::get('/rumah/{id}', [RumahController::class, 'show']);
Route::get('/detail/{id}', [RumahController::class, 'detailUser']);
Route::get('/', [RumahController::class, 'home']);
Route::get('/tiperumah', [TipeRumahController::class, 'index']);
Route::get('/tiperumah/create', [TipeRumahController::class, 'create']);
Route::post('/tiperumah', [TipeRumahController::class, 'store']);
Route::get('/tiperumah/{id}/edit', [TipeRumahController::class, 'edit']);
Route::put('/tiperumah/{id}', [TipeRumahController::class, 'update']);
Route::delete('/tiperumah/{id}', [TipeRumahController::class, 'destroy']);