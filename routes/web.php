<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Admin\DoctorController as AdminDoctorController;

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
    // Route::get('/appointments/register/{doctor}/{time}',[AppointmentController::class,''])->name('appointments.register');
    Route::get('/appointments/register',[DoctorController::class,'showSingleDr'])->name('appointments.register');
});

// Authenticated user routes
// Member 5: User Bookings Page
Route::middleware(['auth'])->group(function () {
    Route::get('/my-appointments', [AppointmentController::class, 'index'])->name('appointments.index');
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


Route::get('/booking/{id}/{clinic_id}', [AppointmentController::class, 'showBookingForm'])->name('booking.show');

Route::post('/appointments/book', [AppointmentController::class, 'store'])
    ->name('appointments.store');



Route::post('/appointments/slots-by-clinic', [AppointmentController::class, 'getSlotsByClinic'])
    ->name('appointments.slotsByClinic');


Route::get('/appointments/confirm/{slot}', [AppointmentController::class, 'confirmBooking'])
    ->name('appointments.confirm');


//require __DIR__.'/auth.php';
