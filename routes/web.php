<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StatusController;


// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/status-check', [StatusController::class, 'check'])->name('status.check');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
