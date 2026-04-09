<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RumahController;

Route::get('/', function () {
    return view('index');
});

Route::get('/rumah', [RumahController::class, 'index']);
Route::get('/rumah/create', [RumahController::class, 'create']);
Route::post('/rumah/store', [RumahController::class, 'store']);
Route::get('/rumah/edit/{id}', [RumahController::class, 'edit']);
Route::post('/rumah/update/{id}', [RumahController::class, 'update']);
Route::delete('/rumah/delete/{id}', [RumahController::class, 'destroy']);

