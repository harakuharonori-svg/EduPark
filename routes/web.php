<?php

use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\LogParkirController;

Route::resource('/', KendaraanController::class)->except(['show']);

Route::resource('kendaraan', KendaraanController::class)->except(['show']);
Route::get('/kendaraan-tes', [KendaraanController::class, 'tes']);

Route::post('/log-parkir/masuk', [LogParkirController::class, 'masuk'])->name('log.masuk');
Route::post('/log-parkir/keluar/{id}', [LogParkirController::class, 'keluar'])->name('log.keluar');
Route::get('/log-parkir', [LogParkirController::class, 'index'])->name('log.index');