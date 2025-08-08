<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Admin\DoctorController as AdminDoctorController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Authenticated user routes
Route::middleware(['auth'])->group(function () {
    // Member 5: User Bookings Page
    Route::get('/my-appointments', [AppointmentController::class, 'index'])->name('appointments.index');
});

// Member 2 & 3: Doctor Routes (public)
Route::prefix('home')->group(function () {
    Route::get('/doctors', [DoctorController::class, 'index'])->name('doctors.index');
    Route::get('/doctors/search', [DoctorController::class, 'search'])->name('doctors.search');
    Route::get('/doctors/show', [DoctorController::class, 'showSingleDr'])->name('doctors.show');
});

// Member 6: Admin Panel for Doctors
Route::prefix('admin')->group(function () {
    Route::get('/doctors', [AdminDoctorController::class,'index'])->name('admin.doctors.index');
    Route::get('/doctors/create', [AdminDoctorController::class, 'create'])->name('admin.doctors.create');
    Route::post('/doctors', [AdminDoctorController::class, 'store'])->name('admin.doctors.store');
    Route::get('/doctors/edit/{id}', [AdminDoctorController::class, 'edit'])->name('admin.doctors.edit');
    Route::post('/doctors/update/{id}', [AdminDoctorController::class, 'update'])->name('admin.doctors.update');
    Route::delete('/doctors/delete/{id}', [AdminDoctorController::class, 'destroy'])->name('admin.doctors.delete');
});


require __DIR__.'/auth.php';