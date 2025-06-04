<?php

use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\AnalisaController;
use App\Http\Controllers\KriteriaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::resource('kriteria', KriteriaController::class);
Route::resource('alternatif', AlternatifController::class);
Route::get('/analisa', function () {
    return view('analisa');
})->name('analisa');
Route::get('/perhitungan', function () {
    return view('perhitungan');
})->name('perhitungan');
Route::get('/analisa', [AnalisaController::class, 'index'])->name('analisa');