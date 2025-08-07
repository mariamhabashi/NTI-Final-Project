<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('home')->group(function(){
    // Route::get('/',[HomeController::class,'index']);
    Route::get('/doctors',[DoctorController::class,'index'])->name('doctors.index');
    Route::get('/doctors/search',[DoctorController::class,'search'])->name('doctors.search');
    Route::get('/doctors/show',[DoctorController::class,'showSingleDr'])->name('doctors.show');

});