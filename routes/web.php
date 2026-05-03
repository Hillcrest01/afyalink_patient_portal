<?php

use App\Http\Controllers\AppointmentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\AuthController;

Route::get('/', [GeneralController::class, 'jobs']);
Route::get('/dashboard', [GeneralController::class, 'dashboard']);

//Authenitcation Routes
Route::post('loginUser', [AuthController::class, 'loginUser'])->name('loginUser');
Route::post('registerUser', [AuthController::class, 'registerUser'])->name('registerUser');
Route::get('logout', [AuthController::class , 'logout'])->name('logout');

//Password Routes
// Route::post('/reset-password', [PasswordController::class, 'resetPassword'])->name('resetPassword');

//Appointment Routes
Route::post('bookAppointment', [AppointmentController::class , 'BookAppointment'])->name('BookAppointment');

