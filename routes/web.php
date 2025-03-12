<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::prefix('/users')
	 ->group(function () {
		 
		 Route::get("/", [ UserController::class, "index" ])
			  ->name("users.index");
	 });

Route::prefix('/patients')
	 ->group(function () {
		 
		 Route::get("/", [ PatientController::class, "index" ])
			  ->name("patients.index");

	 });

Route::prefix('/appointments')
	 ->group(function () {
		 
		 Route::get("/", [ AppointmentController::class, "index" ]);
		 
	 });
