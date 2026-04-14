<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RumahController;

Route::get('/', function () {
    return view('index');
});

Route::resource('rumah', RumahController::class);
Route::get('/rumah', [RumahController::class, 'index']);
Route::get('/rumah/create', [RumahController::class, 'create']);
Route::post('/rumah', [RumahController::class, 'store']);
Route::get('/rumah/edit/{id}', [RumahController::class, 'edit']);
Route::post('/rumah/update/{id}', [RumahController::class, 'update']);
Route::delete('/rumah/delete/{id}', [RumahController::class, 'destroy']);
Route::get('/rumah/{id}', [App\Http\Controllers\RumahController::class, 'show']);
Route::get('/', [RumahController::class, 'home']);  
Route::get('/detail/{id}', [RumahController::class, 'detailUser']);