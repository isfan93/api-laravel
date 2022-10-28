<?php

use App\Http\Controllers\API\MahasiswaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('mahasiswa', [MahasiswaController::class, 'index']);
Route::post('mahasiswa/store', [MahasiswaController::class, 'store']);
Route::get('mahasiswa/show/{id}', [MahasiswaController::class, 'show']);
Route::post('mahasiswa/update/{id}', [MahasiswaController::class, 'update']);
Route::get('mahasiswa/destroy/{id}', [MahasiswaController::class, 'destroy']);
