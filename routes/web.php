<?php

use App\Http\Controllers\HajjController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\UmrahController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\RegistrationController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/status-check', [StatusController::class, 'check'])->name('status.check');

// registration route
// Route::get('/register', [HajjController::class, 'register'])->name('register.hajj');
// web.php
// Route::get('/register/hajj', [HajjController::class, 'register'])->name('register.hajj');
// Route::get('/register/umrah', [UmrahController::class, 'register'])->name('register.umrah');
// Route::get('/register/work', [WorkController::class, 'register'])->name('register.work');

Route::get('/register/hajj', [RegistrationController::class, 'showHajjForm'])->name('register.hajj');
Route::get('/register/umrah', [RegistrationController::class, 'showUmrahForm'])->name('register.umrah');
Route::get('/register/work', [RegistrationController::class, 'showWorkForm'])->name('register.work');


Route::get('/verification', [RegistrationController::class, 'verify'])->name('register.verify');
Route::post('/register/store', [RegistrationController::class, 'store'])->name('register.store');


// Route for the Verification page
Route::get('/verification', function () {
    return view('verification'); // matches verification.blade.php in views folder
});
