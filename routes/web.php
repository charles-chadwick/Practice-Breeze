<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::prefix('/users')
	 ->group(function () {
		 
		 Route::get("/", [ UserController::class, "index" ])
			  ->name("users.index");
		 
		 Route::get("/profile/{id}", [ UserController::class, "profile" ])
			  ->name("users.profile");
	 });

Route::prefix('/appointments')
	 ->group(function () {
		 
		 Route::get("/", [ AppointmentController::class, "index" ]);
		 
	 });
