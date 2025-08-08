<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('register', [RegisterController::class, 'create'])->name('register');
Route::post('register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::prefix('home')->group(function(){
    Route::get('/doctors',[DoctorController::class,'index'])->name('doctors.index');
    Route::get('/doctors/search',[DoctorController::class,'search'])->name('doctors.search');
    Route::get('/doctors/show',[DoctorController::class,'showSingleDr'])->name('doctors.show');
});