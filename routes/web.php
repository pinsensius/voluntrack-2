<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\RelawanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/event', EventController::class);
Route::resource('/relawan', RelawanController::class);
Route::get('/relawan/daftar/{event}', [RelawanController::class, 'daftar'])->name('relawan.daftar');
